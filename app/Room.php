<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = ['name', 'information', 'capacity', 'price', 'facilities'];

    public function company() {
    	$this->belongsTo(Company::class);
    }
}
