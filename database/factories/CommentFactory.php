<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => rand(1, 12),
            'user_id' => rand(1, 6),
            'content' => $this->faker->realText(rand(200, 500)),
            'created_at' => $this->faker->dateTimeBetween('-200 days', '-50 days'),
            'updated_at' => $this->faker->dateTimeBetween('-40 days', '-1 days'),
        ];
    }
}
