<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{

    public function definition() : array
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl([400, 300]),
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(0, 1000, 5000),
            'category_id' => Category::select('id')->orderByRaw("RAND()")->first()->id
        ];
    }
}
