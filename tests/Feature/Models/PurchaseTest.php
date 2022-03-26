<?php

namespace Tests\Unit;

use App\Models\Purchase;
use App\Models\Slot;
use App\Models\User;

it('can create a purcahse model', function() {
    $purchase = Purchase::factory()->create();

    expect($purchase)->toBeInstanceOf(Purchase::class);
    expect($purchase->user)->toBeInstanceOf(User::class);
    expect($purchase->slot)->toBeInstanceOf(Slot::class);
    expect($purchase->status)->toBe('pending');
});
