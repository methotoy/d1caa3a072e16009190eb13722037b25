<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    public function company() {
    	$this->belongsTo(Company::class);
    }
}
