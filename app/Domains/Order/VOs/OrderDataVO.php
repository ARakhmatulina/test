<?php

namespace App\Domains\Order\VOs;

class OrderDataVO
{

    public function __construct(
        private string $client_phone,
        private string $client_name,
        private int $company_id,
        private array $dishes
    ) {}

    public function getClientPhone(): string
    {
        return $this->client_phone;
    }

    public function getClientName(): string
    {
        return $this->client_name;
    }

    public function getCompanyId(): int
    {
        return $this->company_id;
    }

    public function getDishes(): array
    {
        return $this->dishes;
    }

}
