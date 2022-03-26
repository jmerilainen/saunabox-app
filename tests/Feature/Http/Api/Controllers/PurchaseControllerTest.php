<?php

use function Spatie\PestPluginTestTime\testTime;

test('user purchase a slot', function () {
    testTime()->freeze('2022-03-21 10:24:56');

    $sauna = sauna()->create();
    opening()->for($sauna)->create([
        'hours' => [
            'monday' => ['09:00-12:00', '13:00-18:00'],
        ],
    ]);

    $this
        ->post(route('api.purchase'), [
            'phone' => '0436289480394',
            'sauna' => '1',
            'sku' => '202203211500',
        ])
        ->assertJson([]);
});
