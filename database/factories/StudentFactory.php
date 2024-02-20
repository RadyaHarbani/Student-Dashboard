<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nis' => $this->faker->unique()->numberBetween(100000, 599999),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'kelas_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
