<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

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

    public function slotsForDate($date)
    {
        $now = Date::create($date);

        $slots = $this->slots()
            ->whereDate('from', $now)
            ->get();

        $items = $this->opening->slotsForDate($date);

        return $items->map(function ($item) use ($slots) {
            if (! $item->available) {
                return $item;
            }

            $used = $slots->filter(function ($slot) use ($item) {
                $item['from'] = Date::create($item['from']);
                $item['to'] = Date::create($item['to']);
                return $item['from']->greaterThanOrEqualTo($slot->from) && $item['to']->lessThanOrEqualTo($slot->to);
            })->first();

            if ($used) {
                $item->available = false;
            }

            return $item;
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
