<?php

namespace Tests\Unit;

use App\Models\Sauna;
use App\Models\Slot;

it('can create a slot model', function() {
    $slot = Slot::factory()->create([
        'code' => '0493',
    ]);

    expect($slot->sauna)->toBeInstanceOf(Sauna::class);
    expect($slot->code)->toBe('0493');
});
