<?php

namespace App\Services\Routes\API;

use App\Http\Controllers\API\ApiGetCompaniesController;
use App\Http\Controllers\API\ApiGetCompanyController;
use App\Services\Routes\RoutesRegistrar;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider implements RoutesRegistrar
{
    public function register() : void
    {
        Route::get('companies', ApiGetCompaniesController::class)
            ->name(ApiRoutes::API_GET_COMPANIES_ROUTE);
        Route::get('companies/{company}', ApiGetCompanyController::class)
            ->name(ApiRoutes::API_GET_COMPANY_ROUTE);
    }
}
