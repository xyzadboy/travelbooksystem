<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripRequest extends Model
{
    protected $table = 'trip_requests';
    protected $fillable = [
        'nama',
        'no_telepon',
        'tanggal_berangkat',
        'tujuan',
        'durasi',
        'email',
        'catatan',
        'status',
        'unit_id',
    ];
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
