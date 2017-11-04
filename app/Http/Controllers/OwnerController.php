<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Facility as Facility;
use App\Company as Company;
use App\Room as Room;
use App\Image as Image;

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
        $selectedFacilites = ($company = $this->user()->company)? $company->facilities_id : [];
        $facilities = Facility::all();

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
            $data['facilities'] = Facility::find(explode(",",$data['facilities']),['icon_path'])->toJson();
            $data['image'] = Room::find(request()->id)->images->toArray();
            $responseData = $data;
        } else {
            $responseData = $this->user()->company->rooms()->create($data)->toArray();
        }

        if($responseData){
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

    public function imageRoom() {
        $responseMessage = array(
            'status' => 'danger',
            'method' => 'Save'
        );

        $this->validate(request(), [
            'images.*'    =>  'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if(request()->hasFile('images') && request()->images) {
            foreach(request()->images as $image) {
                $path = 'img/rooms/'.request()->id.'/'.md5($image->getClientOriginalName()).time();
                $_path = $image->storeAs($path, 'large.'.$image->getClientOriginalExtension());
                
                // creating medium size for the image
                $mediumImageBackground = \ImageProvider::canvas(500,500);
                $mediumImage = \ImageProvider::make($image)->resize(500,500, function($c){
                    $c->aspectRatio();
                    $c->upsize();
                });

                $mediumImageBackground->insert($mediumImage, 'center');

                $mediumImageBackground->save($path.'/medium.'.$image->getClientOriginalExtension());

                // creating thumbnail size for the image
                $thumbImagebackground = \ImageProvider::canvas(100,100);
                $thumbImage = \ImageProvider::make($image)->resize(100,100, function($c){
                    $c->aspectRatio();
                    $c->upsize();
                });

                $thumbImagebackground->insert($thumbImage, 'center');

                $thumbImagebackground->save($path.'/thumb.'.$image->getClientOriginalExtension());

                Room::find(request()->id)->images()->create([
                    'type' => 'Room',
                    'path' => $path,
                    'file_extension' => $image->getClientOriginalExtension()
                ]);
            }

            $responseMessage['status'] = 'success';
        }

        if(request()->has('deleted_images') && request()->deleted_images) {
            $_images = Image::find(explode(",", request()->deleted_images));

            foreach ($_images as $image) {
                \File::deleteDirectory(public_path($image->path));
            }

            if(Image::destroy(explode(",", request()->deleted_images))) {
                $responseMessage['status'] = 'success';
            } else  {
                $responseMessage['status'] = 'danger';
            }
        }

        $responseMessage['data'] = Room::find(request()->id)->images->toArray();
        
        return response()->json(compact('responseMessage'), 200);
    }

    public function infoImage() {
        $responseMessage = array(
            'status'=> 'danger',
            'data'  => [],
            'method'=> 'Save'
        );

        if(request()->has('id')){
            $responseMessage['status'] = 'success';
            $responseMessage['data'] = $this->user()->company->rooms->find(request()->id)->images->toArray();
        }


        return response()->json(compact('responseMessage'),200);
    }
}
