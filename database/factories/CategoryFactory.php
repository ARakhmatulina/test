<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    public function definition() : array
    {
        return [
            'name' => $this->faker->word,
            'company_id' => Company::select('id')->orderByRaw("RAND()")->first()->id,
        ];
    }
}
