<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyFacility extends Model
{
    protected $table = 'company_facilities';
    
    public function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
