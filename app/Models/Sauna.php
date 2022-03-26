<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauna extends Model
{
    use HasFactory;

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function opening()
    {
        return $this->hasOne(Opening::class);
    }
}
