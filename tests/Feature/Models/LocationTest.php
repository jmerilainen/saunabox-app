<?php

namespace Tests\Unit;

use App\Models\Location;

it('can create a location model', function() {
    $location = Location::factory()->create();

    expect($location)->toBeInstanceOf(Location::class);
    expect($location->longitude)->toBeNumeric();
    expect($location->longitude)->toBeNumeric();
});
