<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
