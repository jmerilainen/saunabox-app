<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
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
            'from' => now(),
            'to' => fn (array $attributes) => (clone $attributes['from'])->modify('+50 minutes'),
            'code' => $this->faker->randomFloat(0, 1000, 9999),
        ];
    }
}
