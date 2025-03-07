<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'pin' => '0000',
            'avatar' => $this->faker->imageUrl,
        ];
    }
}