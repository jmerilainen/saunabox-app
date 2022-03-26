<?php

namespace Tests\Unit;

use App\Models\Opening;
use App\Models\Sauna;
use Spatie\OpeningHours\OpeningHours;

it('can create a opening model', function() {
    $opening = Opening::factory()->create();

    expect($opening->sauna)->toBeInstanceOf(Sauna::class);
    expect($opening->hours)->toBeArray();
    expect($opening->hours())->toBeInstanceOf(OpeningHours::class);
});
