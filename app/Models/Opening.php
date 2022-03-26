<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\OpeningHours\OpeningHours;

class Opening extends Model
{
    use HasFactory;

    protected $casts = [
        'hours' => 'array',
    ];

    protected function sauna()
    {
        return $this->belongsTo(Sauna::class);
    }

    public function hours(): OpeningHours
    {
        return OpeningHours::create($this->hours);
    }
}
