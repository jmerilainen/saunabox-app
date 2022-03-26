<?php

use Illuminate\Testing\Fluent\AssertableJson;

it('shows all saunas as json', function () {
    $saunas = sauna()
        ->count(3)
            ->hasLocation()
            ->hasOpening()
        ->create();

    $frist = $saunas->first();

    $this
        ->get(route('api.saunas'))
        ->assertJson(fn (AssertableJson $json) =>
            $json->has(3)
                ->first(fn ($json) =>
                    $json->where('id', $frist->id)
                        ->where('name', $frist->name)
                        ->where('slug', $frist->slug)
                        ->etc()
                )
        );
});

it('shows a sauna as json', function () {
    $saunas = sauna()
        ->count(3)
            ->hasLocation()
            ->hasOpening()
        ->create();

    $frist = $saunas->first();

    $this
        ->get(route('api.sauna', ['sauna' => $frist->slug]))
        ->assertJson([
            'id' => $frist->id,
        ]);
});
