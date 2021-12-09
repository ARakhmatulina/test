<?php

namespace App\Domains\Dish\Entities;

class DishEntity
{

    public function __construct(
        private int $id,
        private string $name,
        private string $image,
        private string $description,
        private float $price
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

}
