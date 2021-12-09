<?php

namespace App\Http\Controllers\API\Dishes;

use App\Domains\Dish\Services\ApiGetDishService;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetDishController extends Controller
{

    public function __invoke(Request $request, Dish $dish) : Response
    {
        try {
            $apiGetDishesService = new ApiGetDishService($dish->id);
            return response(
                $apiGetDishesService->handle()
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
