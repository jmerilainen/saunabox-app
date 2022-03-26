<?php

namespace App\Http\Api\Controllers;

use App\Models\Sauna;

class SaunaSlotDateController
{
    public function index(Sauna $sauna, $date)
    {
        $slots = $sauna->slotsForDate($date);

        return response()->json($slots->map(fn ($slot) => $this->format($slot)));
    }

    protected function format($slot)
    {
        return [
            'sku' => $slot->sku,
            'slug' => $slot->from->format('Hi'),
            'from' => $slot->from,
            'to' => $slot->to,
            'available' => $slot->available,
        ];
    }
}
