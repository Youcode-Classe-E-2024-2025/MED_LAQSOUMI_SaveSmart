<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'description' => $this->faker->sentence,
        ];
    }
}