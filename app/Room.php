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
}
