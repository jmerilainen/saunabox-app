<?php

namespace Tests\Unit;

use App\Models\Opening;

it('can create a opening hours model', function() {
    $opening = Opening::factory()->create();

    expect($opening->hours)->toBeArray();
});
