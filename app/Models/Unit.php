<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Factories\HasFactory;
use illuminate\Database\Eloquent\Relations\Hasmany;

class Unit extends Model
{
    protected $table = 'unit';
    protected $fillable = [
        'tipe',
        'model',
        'plat_nomor',
        'kapasitas',
        'gambar',
        'fasilitas',
        'cover',
    ];
    protected $casts = [
        'fasilitas' => 'array',
        'gambar' => 'array',
    ];
    public function tripRequests(): HasMany
    {
        return $this->hasMany(TripRequest::class, 'unit_id');
    }

}
