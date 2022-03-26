<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpeningHours>
 */
class OpeningHoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sauna_id' => sauna(),
            'data' => [
                'monday'     => ['09:00-12:00', '13:00-18:00'],
                'tuesday'    => ['09:00-12:00', '13:00-18:00'],
                'wednesday'  => ['09:00-12:00'],
                'thursday'   => ['09:00-12:00', '13:00-18:00'],
                'friday'     => ['09:00-12:00', '13:00-20:00'],
                'saturday'   => ['09:00-12:00', '13:00-16:00'],
                'sunday'     => [],
                'exceptions' => [
                    '2016-11-11' => ['09:00-12:00'],
                    '2016-12-25' => [],
                    '01-01'      => [],
                    '12-25'      => ['09:00-12:00'],
                ],
            ],
        ];
    }
}
