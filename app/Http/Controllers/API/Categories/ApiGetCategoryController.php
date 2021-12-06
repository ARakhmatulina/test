<?php

namespace App\Http\Controllers\API\Categories;

use App\Domains\Category\Services\ApiGetCategoryService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetCategoryController extends Controller
{

    public function __invoke(Request $request, Category $category) : Response
    {
        try {
            $apiGetCategoryService = new ApiGetCategoryService($category->id);
            return response(
                $apiGetCategoryService->handle()
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
