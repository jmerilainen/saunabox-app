<?php

namespace Tests\Unit;

use App\Models\Purchase;
use App\Models\Slot;
use App\Models\User;

it('can create a purchase model', function () {
    $purchase = Purchase::factory()->create();

    expect($purchase)->toBeInstanceOf(Purchase::class);
    expect($purchase->user)->toBeInstanceOf(User::class);
    expect($purchase->slot)->toBeInstanceOf(Slot::class);
    expect($purchase->status)->toBe('pending');
});

test('that user can make purchase a slot', function () {
    $user = user()->create();
    $slot = slot()->create();

    $purchase = Purchase::factory()
        ->for($user)
        ->for($slot)
        ->create();

    expect($user->id)->toBe($purchase->user->id);
    expect($slot->id)->toBe($purchase->slot->id);
});
