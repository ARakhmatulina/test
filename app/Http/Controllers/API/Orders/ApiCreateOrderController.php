<?php

namespace App\Http\Controllers\API\Orders;

use App\Domains\Order\Services\ApiCreateOrderService;
use App\Domains\Order\VOs\OrderDataVO;
use App\Http\Controllers\API\Orders\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class ApiCreateOrderController extends Controller
{

    public function __invoke(OrderRequest $request)
    {
        $orderData = new OrderDataVO(
            $request->get('client_phone'),
            $request->get('client_name'),
            $request->get('company_id'),
            $request->get('dishes')
        );

        $createOrderService = new ApiCreateOrderService($orderData);
        $createOrderService->handle();
    }
}
