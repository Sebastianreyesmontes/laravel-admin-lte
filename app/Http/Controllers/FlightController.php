<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $vuelos = Flight::get()->toArray();
        // dd($vuelos);
        return view ('/')->with(compact('vuelos'));
    }
}
