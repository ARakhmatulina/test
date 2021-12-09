<?php

namespace App\Domains\Dish\Services;

use App\Contracts\ApiService;
use App\Domains\Dish\DTOs\DishDTO;
use App\Domains\Dish\Repositories\ApiDishesRepository;

class ApiGetDishesService implements ApiService
{

    public function __construct(
        private ?int $categoryId
    ) {}

    public function getApiDishesRepository() : ApiDishesRepository
    {
        return app(ApiDishesRepository::class);
    }

    public function handle() : array
    {
        $apiDishesRepository = $this->getApiDishesRepository();

        $filters = $this->categoryId ? ['categoryId' => $this->categoryId] : [];
        $dishes = $apiDishesRepository->getAll($filters);

        return $this->toArray($dishes);
    }

    public function toArray(array $dishesEntities) : array
    {
        $dishesArray = [];
        foreach ($dishesEntities as $dishesEntity) {
            $dishesArray[] = DishDTO::toArray($dishesEntity);
        }

        return $dishesArray;
    }
}
