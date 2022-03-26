<?php

namespace App\Http\Api\Controllers;

use App\Models\Sauna;
use Illuminate\Http\Request;

class SaunaSlotDateController
{
    public function index(Sauna $sauna, Request $request)
    {
        $slots = $sauna->slotsForDate($request->date);

        return response()->json($slots->map(fn ($slot) => $this->format($slot)));
    }

    protected function format($slot)
    {
        return [
            'slug' => $slot->from->format('Hi'),
            'from' => $slot->from,
            'to' => $slot->to,
            'available' => $slot->available,
        ];
    }
}
