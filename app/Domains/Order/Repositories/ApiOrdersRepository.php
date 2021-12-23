<?php

namespace App\Domains\Order\Repositories;

use App\Contracts\ApiRepository;
use App\Domains\Order\DTOs\OrderDTO;
use App\Domains\Order\Entities\OrderEntity;
use App\Models\Order;

class ApiOrdersRepository implements ApiRepository
{

    public function getAll(array $filters = [])
    {
        // TODO: Implement getAll() method.
    }

    public function getById(int $id) : OrderEntity
    {
        $order = Order::where('id', $id)->with(['dishes', 'company'])->first();

        return OrderDTO::fromModel($order);
    }
}
