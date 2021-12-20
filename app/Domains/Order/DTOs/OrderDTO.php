<?php

namespace App\Domains\Order\DTOs;

use App\Domains\Company\DTOs\CompanyDTO;
use App\Domains\Dish\DTOs\DishDTO;
use App\Domains\Order\Entities\OrderEntity;
use App\Models\Order;

class OrderDTO
{

    public static function fromModel(Order $order) : OrderEntity
    {
        $orderEntity = new OrderEntity(
            sum:$order->sum,
            phone: $order->client_phone,
            clientName: $order->client_name,
            company: CompanyDTO::fromModel($order->company),
            id: $order->id
        );

        foreach ($order->dishes as $dish) {
            $orderEntity->addDish(DishDTO::fromModel($dish));
        }

        return $orderEntity;
    }

    public static function forModel(OrderEntity $order) : array
    {
        return [
            "sum" => $order->getSum(),
            "client_phone" => $order->getPhone(),
            "client_name" => $order->getClientName(),
            "company_id" => $order->getCompany()->getId(),
        ];
    }

    public static function toArray(OrderEntity $order) : array
    {
        $dishes = [];

        foreach ($order->getDishes() as $dish) {
            $dishes[] = [
                'id' => $dish->getId(),
                'name' => $dish->getName()
            ];
        }
        return [
            'orderNumber' => $order->getId(),
            'company' => $order->getCompany()->getName(),
            'clientPhone' => $order->getPhone(),
            'clientName' => $order->getClientName(),
            'sum' => $order->getSum(),
            'dishes' => $dishes
        ];
    }
}
