<?php

namespace App\Http\Controllers\API;

use App\Domains\Company\Services\ApiGetCompanyService;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetCompanyController extends Controller
{

    public function __invoke(Request $request, Company $company): Response
    {
        try {
            $apiGetCompanyService = new ApiGetCompanyService($company->id);
            return response(
                $apiGetCompanyService->handle()
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
