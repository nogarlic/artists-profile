<?php

namespace Database\Factories;

use App\Models\User;
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
            "body" => collect($this->faker->paragraphs(mt_rand(1,3)))->map(function ($p){
                return "<p>$p</p>";
            })->implode(''),
            "upvote" => rand(0,100),
            "downvote" => rand(0,100),
            "user_id" => $this->faker->numberBetween(1,User::count()),
            "category_id" => $this->faker->numberBetween(1,11)
        ];
    }
}
