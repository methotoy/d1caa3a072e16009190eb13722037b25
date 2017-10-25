<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facility as Facility;
use App\Company as Company;
use App\Room as Room;

class OwnerController extends Controller
{
    protected $user;

	public function __construct()
    {
        $this->middleware('owner');
    }

    private function user() {
        return \Auth::guard('owner')->user();
    }

    public function index()
    {
        $selectedFacilites = ($company = $this->user()->company)? $company->facilities : "";
        $facilities = Facility::all();

        $selectedFacilites = array_map('intval', explode(",", $selectedFacilites));
        $test = array();

        foreach ($facilities as $facility) {
            if(in_array($facility->id, $selectedFacilites)){
              $facility->status = 'checked';
            } else {
                $facility->status = '';
            }
        }

        return view('owner.index')->with('facilities', $facilities);
    }

    public function rooms()
    {
        $facilities = Facility::all();
        $rooms = ($company = $this->user()->company)? $company->rooms : array();

        dd($rooms->toJson());

        // DIRE NAAAAAAAAAAHHHHHHHHHHHHHHH!!

        if(!empty($rooms)) {
            $fac = $facilities->keyBy('id');
            foreach ($rooms as $room) {
                $_temp = $fac->get($room->id);
                dd([
                    'id' => $room->id,
                    'room' => $_temp->toJson()
                ]);
            }
        }

        return view('owner.rooms')->with(compact('facilities', 'rooms'));
    }

    public function updateAccount( $type )
    {
        $success = false;

        if($type === 'company') {
            $data = $this->validate(request(), [
                'address' => 'required',
                'description'  => 'required',
                'email_address' => 'required|email',
                'facilities' => 'required',
                'fax_number' => 'required',
                'map_lat' => 'required|numeric',
                'map_lng' => 'required|numeric',
                'name' => 'required',
                'phone_number' => 'required',
                'price_range' => 'required|numeric',
                'total_rooms' => 'required|numeric',
                'zip_code' => 'required|numeric'
            ]);

            $data['facilities'] = implode(",",$data['facilities']);
            $data['user_id'] = $this->user()->id;

            if(request()->has('id')) {
                $success = Company::find(request()->id)->update($data);
            } else {
                $success = Company::insert($data);
            }            
        } else {
            $data = $this->validate(request(), [
                'firstname' => 'required',
                'lastname'  => 'required',
                'email' => 'required|email',
            ]);

            $success = $this->user()->update($data);
        }

        return response()->json([
            'status' => $success? 'success' : 'danger',
            'method' => request()->has('id')? 'Update' : 'Save'
        ]);
    }

    public function updateRoom( $type )
    {
        $responseMessage = array();

        if($type === 'add') {
            $data = $this->validate(request(), [
                'name' => 'required',
                'information' => 'required',
                'capacity' => 'required|numeric',
                'price' => 'required|numeric',
                'facilities' => 'required'
            ]);

            $data['facilities'] = implode(",",$data['facilities']);

            $responseMessage = $this->user()->company->rooms()->create($data);
        }

        return response()->json(compact('responseMessage'), 200);
    }
}
