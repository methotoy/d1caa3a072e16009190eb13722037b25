<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Facility as Facility;
// use App\Rooms as Rooms;

class OwnerController extends Controller
{
	public function __construct()
    {
        $this->middleware('owner');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owner.index')->with('facilities', Facility::all());
    }

    public function rooms()
    {
        // return view('owner.rooms')->with('facilities', Rooms::currentUserCompany());
        return view('owner.rooms');
    }
}
