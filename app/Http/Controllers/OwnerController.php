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

    public function index()
    {
        // $user = \Auth::guard('owner')->user();
        // $facilities = Facility::all();
        // $data = Array(
        //     Array('id' => 1),
        //     Array('id' => 2)
        // );
        
        // dd($data);


        // foreach ($facilities as $facility) {
        //   $facility->status = 'checked';
        // }

        return view('owner.index')->with('facilities', Facility::all());
    }

    public function rooms()
    {
        return view('owner.rooms');
    }

    public function updateAccount( $type )
    {
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
            $data['user_id'] = \Auth::guard('owner')->user()->id;

            if(request()->has('id')) {
                $success = Company::find(request()->id)->update($data);
            } else {
                $success = Company::insert($data);
            }

            return response()->json([
                'status' => $success? 'success' : 'danger',
                'method' => request()->has('id')? 'Update' : 'Save'
            ]);
        }
    }
}
