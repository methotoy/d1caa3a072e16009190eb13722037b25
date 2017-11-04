<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
            'user_id', 'name', 'address', 'zip_code', 'map_lat', 'map_lng', 'phone_number', 'fax_number', 'email_address', 'total_rooms', 'price_range', 'information', 'description', 'facilities'
    ];

    protected $hidden = ['user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function rooms()
    {
    	return $this->hasMany(Room::class);
    }

    public function images(){
    	return $this->hasMany(Image::class, 'type_id')->imagesOf('Company');
    }

    public function getFacilitiesAttribute($value){
        $_arrValue = $value? explode(",", $value) : [];
        $facilities = Facility::all()->keyBy('id');;
        $_tempFacilityPath = array();

        foreach($_arrValue as $value) {
            $_temp = $facilities->get($value);
            $_tempFacilityPath[] = array(
                'id'    => $_temp->id,
                'icon_path'  => $_temp->icon_path
            );
        }


        return $_tempFacilityPath;
        
    }

    public function getFacilitiesIdAttribute(){
        return array_column($this->facilities, 'id');
    }
}
