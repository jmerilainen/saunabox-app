<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Spatie\OpeningHours\OpeningHours;

class Opening extends Model
{
    use HasFactory;

    protected $casts = [
        'hours' => 'array',
    ];

    public function sauna()
    {
        return $this->belongsTo(Sauna::class);
    }

    public function hours(): OpeningHours
    {
        return OpeningHours::create($this->hours);
    }

    public function forDate($date)
    {
        $now = Date::create($date);

        return collect($this->hours()->forDate($now))->map(function ($date) use ($now) {
            return [
                'from' => $date->start()->toDateTime($now),
                'to' => $date->end()->toDateTime($now),
            ];
        });
    }

    public function slotsForDate($date)
    {
        $now = Date::create($date);

        return $this->forDate($now)->flatMap(function ($range) {
            $hours = CarbonPeriod::create()
                ->excludeEndDate()
                ->setDateClass(CarbonImmutable::class)
                ->since($range['from'])
                ->hours(1)
                ->until($range['to']);

            return collect($hours)
                ->map(function (CarbonImmutable $date) {
                    $slot = new Slot;
                    $slot->sauna_id = $this->sauna->id;
                    $slot->from = $date;
                    $slot->to = $date->addHour(1)->subMinutes(10);
                    $slot->available = $date->greaterThan(now());
                    $slot->sku = $date->format('YmdHi');

                    return $slot;
                });
        });
    }

    public function findAvailableSlotBySku($sku)
    {
        $date = Date::createFromFormat('YmdHi', $sku);

        return $this->slotsForDate($date)->filter(function ($slot) use ($sku) {
            return $slot->sku === $sku
                && $slot->available;
        })->first();
    }
}
