<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'beds'];

    function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
