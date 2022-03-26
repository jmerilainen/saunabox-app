<?php

namespace Tests\Unit;

use App\Models\Location;
use App\Models\Sauna;

it('can create a location model', function() {
    $location = Location::factory()->create();

    expect($location)->toBeInstanceOf(Location::class);
    expect($location->sauna)->toBeInstanceOf(Sauna::class);
    expect($location->longitude)->toBeNumeric();
    expect($location->longitude)->toBeNumeric();
});
