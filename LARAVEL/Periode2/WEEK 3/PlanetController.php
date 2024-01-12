<?php

namespace App\Http\Controllers;
use Illuminate\Support\facades\DB;
use App\Models\planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function index()
    {
        // $planets = DB::table{'planets'}->get();
        $planets = Planet::all();

        return view('Planeten')->with(['planets' => $planets]);
    }

    public function show($planet)
    {
        $planets = Planet::where('name', $planet)->get();
        return view('Planeten')->with(['planets' => $planets]);
    }
}
