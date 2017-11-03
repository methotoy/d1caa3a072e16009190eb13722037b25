<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = ['name', 'information', 'capacity', 'price', 'facilities'];

    public function company() {
    	return $this->belongsTo(Company::class);
    }

    public function images(){
    	return $this->hasMany(Image::class, 'type_id')->imagesOf('Room');
    }

    public function getFacilitiesAttribute($value){
        $_arrValue = $value? explode(",", $value) : [];
        $facilities = Facility::all()->keyBy('id');;
        $_tempFacilityPath = array();

        foreach($_arrValue as $value) {
            $_temp = $facilities->get($value);
            $_tempFacilityPath[] = $_temp->icon_path;
        }


        return $_tempFacilityPath;
        
    }
}
