<?php

namespace App\Domains\Dish\DTOs;

use App\Domains\Dish\Entities\DishEntity;
use App\Models\Dish;

class DishDTO
{

    public static function fromModel(Dish $dish) : DishEntity
    {
        return new DishEntity(
            id: $dish->id,
            name: $dish->name,
            image: $dish->image,
            description: $dish->description,
            price: $dish->price
        );
    }

    public static function toArray(DishEntity $dishEntity) : array
    {
        return [
            'id' => $dishEntity->getId(),
            'name' => $dishEntity->getName(),
            'image' => $dishEntity->getImage(),
            'description' => $dishEntity->getDescription(),
            'price' => $dishEntity->getPrice()
        ];
    }
}
