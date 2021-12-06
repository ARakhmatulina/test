<?php

namespace App\Http\Controllers\API\Companies;

use App\Domains\Company\Services\ApiGetCompaniesService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiGetCompaniesController extends Controller
{

    public function getApiGetCompaniesService() : ApiGetCompaniesService
    {
        return app(ApiGetCompaniesService::class);
    }

    public function __invoke(Request $request): Response
    {
        try {
            return response(
                $this->getApiGetCompaniesService()->handle(),
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
