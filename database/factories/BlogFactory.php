<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $judul = fake()->sentence();

        return [
            'judul' => $judul,
            'konten' => fake()->text(rand(1000, 5000)),
            'pembuat' => fake()->name(),
        ];
    }
}
