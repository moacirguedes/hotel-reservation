<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'beds'];

    function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
