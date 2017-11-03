<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company as Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index')->with('companies', Company::all());
    }

    public function details($id)
    {
        return view('company.details')->with('company', Company::find($id));
    }
}
