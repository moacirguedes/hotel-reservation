<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['total_price', 'check_in', 'check_out'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
