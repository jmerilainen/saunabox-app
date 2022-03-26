<?php

namespace App\Http\Api\Controllers;

use App\Models\Purchase;
use App\Models\Sauna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PurchaseController
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required',
            'sauna' => ['required', 'exists:saunas,id'],
            'sku' => ['required', 'digits:12'],
        ]);

        $slot = Sauna::findOrFail($data['sauna'])->findAvailableSlotBySku($data['sku']);

        abort_if(! $slot, 400);

        $slot->code = str($data['phone'])->substr(-4);
        unset($slot->sku, $slot->available);

        $slot->save();

        $user = User::firstOrCreate([
            'phone' => $data['phone'],
        ], [
            'name' => '',
            'email' => $data['phone'],
            'password' => Hash::make(Str::random(14)),
            'phone' => $data['phone'],
        ]);

        $purchase = Purchase::make();
        $purchase->slot_id = $slot->id;
        $purchase->user_id = $user->id;
        $purchase->save();

        return response()->json([
            'purchase' => $purchase->id,
            'code' => $slot->code,
        ]);
    }
}
