<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
            'user_id', 'name', 'address', 'zip_code', 'map_lat', 'map_lng', 'phone_number', 'fax_number', 'email_address', 'total_rooms', 'price_range', 'information', 'description', 'facilities'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function rooms()
    {
    	return $this->hasMany(Room::class);
    }
}
