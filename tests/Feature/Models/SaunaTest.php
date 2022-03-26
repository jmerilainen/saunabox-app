<?php

namespace Tests\Unit;

use App\Models\Sauna;

it('can create a sauna model', function() {
    $sauna = Sauna::factory()->create([
        'name' => 'Matinkylän ranta',
    ]);

    expect($sauna->slug)->toBe('matinkylan-ranta');
});
