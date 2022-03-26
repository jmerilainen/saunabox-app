<?php

namespace Tests\Unit;

use App\Models\Opening;
use Spatie\OpeningHours\OpeningHours;

it('can create a opening model', function() {
    $opening = Opening::factory()->create();

    expect($opening->hours)->toBeArray();
    expect($opening->hours())->toBeInstanceOf(OpeningHours::class);
});
