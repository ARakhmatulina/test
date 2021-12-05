<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Seeder;

class DishesSeeder extends Seeder
{

    public function run() : void
    {
        Dish::factory()->count(45)->create();
    }
}
