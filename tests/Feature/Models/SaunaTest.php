<?php

namespace Tests\Unit;

use App\Models\Location;
use App\Models\Sauna;
use Spatie\OpeningHours\OpeningHours;

it('can create a sauna model', function () {
    $sauna = Sauna::factory()->create([
        'name' => 'Matinkylän ranta',
    ]);

    expect($sauna->slug)->toBe('matinkylan-ranta');
});

it('can create relations for sauna', function () {
    $sauna = sauna()->create();
    $location = location()->for($sauna)->create();
    $opening = opening()->for($sauna)->create();

    expect($sauna->location)->toBeInstanceOf(Location::class);
    expect($sauna->opening->hours())->toBeInstanceOf(OpeningHours::class);
});
