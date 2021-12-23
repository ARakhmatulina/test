<?php

namespace App\Http\Controllers\API\Orders;

use App\Domains\Order\Services\ApiGetOrderService;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetOrderController extends Controller
{

    public function __invoke(Request $request, Order $order) : Response
    {
        try {
            $apiGetOrderService = new ApiGetOrderService($order->id);
            return response(
                $apiGetOrderService->handle()
            );
        }
        catch (\Exception $exception) {
            return response(json_encode([
                'result' => false,
                'error' => $exception->getMessage()
            ]));
        }
    }
}
