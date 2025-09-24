<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'text' => $this->faker->sentence(12),
            'avatar' => '/assets/images/logo.png',
            'user_id' => User::factory(),
        ];
    }
}


