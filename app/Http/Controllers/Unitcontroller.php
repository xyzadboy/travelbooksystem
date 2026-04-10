<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class Unitcontroller extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('welcome', compact('units'));
    }
}
