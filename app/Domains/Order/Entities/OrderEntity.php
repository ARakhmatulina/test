<?php

namespace App\Domains\Order\Entities;

use App\Domains\Company\Entities\CompanyEntity;
use App\Domains\Dish\Entities\DishEntity;

class OrderEntity
{

    public function __construct(
        private float $sum,
        private string $phone,
        private string $clientName,
        private CompanyEntity $company,
        private ?int $id = null,
    ) {}

    public function getSum(): float
    {
        return $this->sum;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getClientName(): string
    {
        return $this->clientName;
    }

    public function getCompany(): CompanyEntity
    {
        return $this->company;
    }

    public function getDishes() : array
    {
        return $this->dishes;
    }

    public function addDish(DishEntity $dish) : void
    {
        $this->dishes[] = $dish;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}
