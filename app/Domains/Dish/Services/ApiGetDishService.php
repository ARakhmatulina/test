<?php

namespace App\Domains\Dish\Services;

use App\Contracts\ApiService;
use App\Domains\Dish\DTOs\DishDTO;
use App\Domains\Dish\Entities\DishEntity;
use App\Domains\Dish\Repositories\ApiDishesRepository;

class ApiGetDishService implements ApiService
{

    public function getApiDishesRepository() : ApiDishesRepository
    {
        return app(ApiDishesRepository::class);
    }

    public function __construct(
        private int $id
    ) {}

    public function handle() : array
    {
        $apiDishesRepository = $this->getApiDishesRepository();
        $dish = $apiDishesRepository->getById($this->id);

        return $this->toArray($dish);
    }

    private function toArray(DishEntity $dish) : array
    {
        return DishDTO::toArray($dish);
    }
}
