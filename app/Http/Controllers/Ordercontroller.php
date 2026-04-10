<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\TripRequest;

class Ordercontroller extends Controller
{
    public function order()
    {
        $units = Unit::all();
        return view('order', compact('units'));
    }

  public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'no_telepon' => 'required|string|max:20',
        'unit_id' => 'required|exists:unit,id',
        'tanggal_berangkat' => 'required|date',
        'durasi' => 'required|integer|min:1',
        'tujuan' => 'required|string|max:255',
    ]);

    $order = new TripRequest();
    $order->nama = $request->nama;
    $order->email = $request->email;
    $order->no_telepon = $request->no_telepon;
    $order->unit_id = $request->unit_id;
    $order->tanggal_berangkat = $request->tanggal_berangkat;
    $order->durasi = $request->durasi;
    $order->tujuan = $request->tujuan;
    $order->catatan = $request->catatan;
    $order->status = 'request'; // default status
    $order->save();

    return redirect()->back()->with('success', 'Pemesanan berhasil! Kami akan menghubungi Anda segera.');
}
}
