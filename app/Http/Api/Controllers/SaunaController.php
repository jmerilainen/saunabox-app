<?php

namespace App\Http\Api\Controllers;

use App\Models\Location;
use App\Models\Sauna;

class SaunaController
{
    public function index()
    {
        $saunas = Sauna::all();

        return response()->json($saunas->map(fn ($sauna) => $this->format($sauna)));
    }

    public function show(Sauna $sauna)
    {
        return response()->json($this->format($sauna));
    }

    protected function format(Sauna $sauna)
    {
        return [
            'id' => $sauna->id,
            'name' => $sauna->name,
            'slug' => $sauna->slug,
            'location' => transform($sauna->location, function (Location $location) {
                return [
                    'latitude' => $location->latitude,
                    'longitude' => $location->longitude,
                ];
            }),
        ];
    }
}
