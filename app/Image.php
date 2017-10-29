<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['type', 'name', 'path'];

    public function scopeImagesOf($query,$type) {
    	return $query->where('type', $type);
    }
}
