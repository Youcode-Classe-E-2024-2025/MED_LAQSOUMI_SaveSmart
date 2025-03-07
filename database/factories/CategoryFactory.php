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
            ['name' => 'Housing', 'color' => '#3B82F6CC'],
            ['name' => 'Food', 'color' => '#FBBF24CC'],
            ['name' => 'Transportation', 'color' => '#22C55ECC'],
            ['name' => 'Entertainment', 'color' => '#EF4444CC'],
            ['name' => 'Utilities', 'color' => '#A855F7CC'],
            ['name' => 'Health', 'color' => '#34D399CC'],
            ['name' => 'Education', 'color' => '#F59E0BCC'],
            ['name' => 'Insurance', 'color' => '#6366F1CC'],
            ['name' => 'Personal', 'color' => '#D97706CC'],
            ['name' => 'Others', 'color' => '#9CA3AFCC'],
        ];

        $category = $this->faker->randomElement($categories);

        return [
            'name' => $category['name'],
            'description' => $this->faker->sentence,
            'color' => $category['color'],
        ];
    }
}