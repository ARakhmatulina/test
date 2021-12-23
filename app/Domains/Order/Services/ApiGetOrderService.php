<?php

namespace App\Domains\Order\Services;

use App\Contracts\ApiService;
use App\Domains\Order\DTOs\OrderDTO;
use App\Domains\Order\Entities\OrderEntity;
use App\Domains\Order\Repositories\ApiOrdersRepository;

class ApiGetOrderService implements ApiService
{

    public function __construct(
        private int $id
    ) {}

    public function getApiOrdersRepository() : ApiOrdersRepository
    {
        return app(ApiOrdersRepository::class);
    }

    public function handle() : array
    {
        $order = $this->getApiOrdersRepository()->getById($this->id);

        return $this->toArray($order);
    }

    private function toArray(OrderEntity $order) : array
    {
        return OrderDTO::toArray($order);
    }
}
