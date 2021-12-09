<?php

namespace App\Domains\Dish\Repositories;

use App\Contracts\ApiRepository;
use App\Domains\Dish\DTOs\DishDTO;
use App\Domains\Dish\Entities\DishEntity;
use App\Models\Dish;
use Illuminate\Database\Eloquent\Builder;

class ApiDishesRepository implements ApiRepository
{

    public function getAll(array $filters = []) : array
    {
        $dishes = Dish::query();
        $this->applyFilters($dishes, $filters);

        $dishesEntities = [];
        foreach ($dishes->get() as $dish) {
            $dishesEntities[] = DishDTO::fromModel($dish);
        }

        return $dishesEntities;
    }

    public function getById(int $id) : DishEntity
    {
        $dish = Dish::find($id);

        return DishDTO::fromModel($dish);
    }

    private function applyFilters(Builder $query, array $filters) : void
    {
        if (isset($filters['categoryId'])) {
            $query->where('category_id', $filters['categoryId']);
        }
    }
}
