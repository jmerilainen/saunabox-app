<?php

use Illuminate\Testing\Fluent\AssertableJson;

it('allows an author to view a preview post', function () {
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
