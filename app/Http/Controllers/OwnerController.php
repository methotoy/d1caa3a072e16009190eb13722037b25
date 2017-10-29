<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facility as Facility;
use App\Company as Company;
use App\Room as Room;

class OwnerController extends Controller
{
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
        $allFacilities = Facility::all();
        $rooms = ($company = $this->user()->company)? $company->rooms : array();

        $_facilities = array();

        if(!empty($rooms)) {
            $fac = $allFacilities->keyBy('id');

            foreach ($rooms as $room) {
                $_tempFacilityPath = array();

                foreach (explode(",", $room->facilities) as $facility) {
                    $_temp = $fac->get($facility);
                    $_tempFacilityPath[] = $_temp->icon_path;
                }

                $room->facilities = $_tempFacilityPath;
            }
        }

        return view('owner.rooms')->with(compact('allFacilities', 'rooms'));
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

        $data = $this->validate(request(), [
            'name' => 'required',
            'information' => 'required',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
            'facilities' => 'required'
        ]);

        $data['facilities'] = implode(",",$data['facilities']);

        if(request()->has('id') && $this->user()->company->rooms()->find(request()->id)->update($data)) { 
           $data['id'] = request()->id;
           $responseData = $data;
        } else {
            $responseData = $this->user()->company->rooms()->create($data)->toArray();
        }

        if($responseData){
            $responseData['facilities'] = Facility::find(explode(",",$responseData['facilities']),['icon_path'])->toJson();

            $responseMessage['status'] = 'success';
            $responseMessage['data'] = $responseData;
            $responseMessage['method'] = $type == 'add' ? 'Adde' : 'Update';
        } else {
            $responseMessage['status'] = 'danger';
            $responseMessage['data'] = array();
            $responseMessage['method'] = 'Adde';
        }

        return response()->json(compact('responseMessage'), 200);
    }

    public function deleteRoom()
    {   
        $responseMessage = array('status' => 'danger', 'method' => 'Delete');

        if(request()->has('id')) {
            if(Room::find(request()->id)->delete()) {
                $responseMessage['status'] = 'success';
                $responseMessage['id'] = request()->id;
            }

        }

        return response()->json(compact('responseMessage'), 200);
    }

    public function infoRoom() {
        $responseMessage = array();

        if(request()->has('id')) {
            $responseMessage['data'] = Room::find(request()->id);
        }

        return response()->json(compact('responseMessage'), 200);
    }
}
