<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 6),
            'title' => $this->faker->realText(rand(25, 30)),
            'excerpt' => $this->faker->realText(rand(100, 120)),
            'created_at' => $this->faker->dateTimeBetween('-200 days', '-50 days'),
            'updated_at' => $this->faker->dateTimeBetween('-40 days', '-1 days'),
            'description' => $this->faker->realText(rand(200, 300)),
        ];
    }
}
