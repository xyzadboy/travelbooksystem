<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class Detailcontroller extends Controller
{
    public function detail($id)
    {
        $details = Unit::findOrFail($id);
        return view('detail', compact('details'));
    }
}
