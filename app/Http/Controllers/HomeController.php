<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('home', compact('vehicules'));
    }
}
