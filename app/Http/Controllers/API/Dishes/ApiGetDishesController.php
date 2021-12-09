<?php

namespace App\Http\Controllers\API\Dishes;

use App\Domains\Dish\Services\ApiGetDishesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetDishesController extends Controller
{

    public function __invoke(Request $request) : Response
    {
        $categoryId = $request->get('category_id') ?? null;

        try {
            $apiGetDishesService = new ApiGetDishesService($categoryId);
            return response(
                $apiGetDishesService->handle(),
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
