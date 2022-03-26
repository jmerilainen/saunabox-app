<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opening>
 */
class OpeningFactory extends Factory
{
    protected function data()
    {
        return [
            ['09:00-12:00', '13:00-18:00'],
            ['09:00-21:00'],
            ['07:00-14:00'],
            ['12:00-14:00'],
            ['09:00-12:00', '13:00-20:00'],
            ['09:00-12:00', '13:00-16:00'],
            ['09:00-12:00'],
            ['07:00-23:00'],
        ];
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'sauna_id' => SaunaFactory::new(),
            'hours' => [
                'monday'     => $this->faker->randomElement($this->data()),
                'tuesday'    => $this->faker->randomElement($this->data()),
                'wednesday'  => $this->faker->randomElement($this->data()),
                'thursday'   => $this->faker->randomElement($this->data()),
                'friday'     => $this->faker->randomElement($this->data()),
                'saturday'   => $this->faker->randomElement($this->data()),
                'sunday'     => [],
                'exceptions' => [
                    '2016-11-11' => $this->faker->randomElement($this->data()),
                    '2016-12-25' => [],
                    '01-01'      => [],
                    '12-25'      => $this->faker->randomElement($this->data()),
                ],
            ],
        ];
    }
}
