<?php

namespace Tests\Unit;

use App\Models\Opening;
use App\Models\Sauna;
use Spatie\OpeningHours\OpeningHours;

it('can create a opening model', function () {
    $opening = Opening::factory()->create();

    expect($opening->sauna)->toBeInstanceOf(Sauna::class);
    expect($opening->hours)->toBeArray();
    expect($opening->hours())->toBeInstanceOf(OpeningHours::class);
});

it('wil return hours for date', function () {
    $opening = Opening::factory()->create([
        'hours' => [
            'monday' => ['09:00-12:00', '13:00-18:00'],
        ],
    ]);

    // Test for date in Monday
    $ranges = $opening->forDate('2022-03-21');
    expect($ranges[0]['from']->format('H:i'))->toBe('09:00');
    expect($ranges[0]['to']->format('H:i'))->toBe('12:00');
    expect($ranges[1]['from']->format('H:i'))->toBe('13:00');
    expect($ranges[1]['to']->format('H:i'))->toBe('18:00');
});
