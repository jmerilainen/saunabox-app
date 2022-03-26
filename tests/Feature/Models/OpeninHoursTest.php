<?php

namespace Tests\Unit;

use App\Models\OpeningHours;

it('can create a opening hours model', function() {
    $openingHours = OpeningHours::factory()->create();

    expect($openingHours->data)->toBeArray();
});
