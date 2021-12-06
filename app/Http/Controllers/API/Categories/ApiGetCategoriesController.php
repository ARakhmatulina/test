<?php

namespace App\Http\Controllers\API\Categories;

use App\Domains\Category\Services\ApiGetCategoriesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetCategoriesController extends Controller
{

    public function __invoke(Request $request) : Response
    {
        $companyId = $request->get('company_id') ?? null;

        try {
            $apiGetCategoriesService = new ApiGetCategoriesService($companyId);
            return response(
                $apiGetCategoriesService->handle(),
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
