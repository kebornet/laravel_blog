<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentUserLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_id' => rand(1, 60),
            'user_id' => rand(1, 6),
            'created_at' => $this->faker->dateTimeBetween('-200 days', '-50 days'),
            'updated_at' => $this->faker->dateTimeBetween('-40 days', '-1 days'),
        ];
    }
}
