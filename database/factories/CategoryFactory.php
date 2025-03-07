<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $categories = [
            ['name' => 'Housing', 'color' => 'rgba(59, 130, 246, 0.8)'],
            ['name' => 'Food', 'color' => 'rgba(251, 191, 36, 0.8)'],
            ['name' => 'Transportation', 'color' => 'rgba(34, 197, 94, 0.8)'],
            ['name' => 'Entertainment', 'color' => 'rgba(239, 68, 68, 0.8)'],
            ['name' => 'Utilities', 'color' => 'rgba(168, 85, 247, 0.8)'],
            ['name' => 'Others', 'color' => 'rgba(156, 163, 175, 0.8)'],
        ];

        $category = $this->faker->randomElement($categories);

        return [
            'name' => $category['name'],
            'description' => $this->faker->sentence,
            'color' => $category['color'],
        ];
    }
}