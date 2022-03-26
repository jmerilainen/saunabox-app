<?php

use function Spatie\PestPluginTestTime\testTime;

it('shows sauna\'s time slots', function () {
    testTime()->freeze('2022-03-21 10:24:56');

    $sauna = sauna()
        ->hasLocation()
        ->hasOpening([
            'hours' => [
                'monday' => ['09:00-12:00', '13:00-18:00'],
            ],
        ])
        ->create();

    // Monday
    $this
        ->get(route('api.sauna.slots', ['sauna' => $sauna->slug, 'date' => '2022-03-21']))
        ->dd()
        ->assertJson([]);
});
