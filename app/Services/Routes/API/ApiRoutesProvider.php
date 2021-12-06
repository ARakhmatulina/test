<?php

namespace App\Services\Routes\API;

use App\Http\Controllers\API\Categories\ApiGetCategoriesController;
use App\Http\Controllers\API\Categories\ApiGetCategoryController;
use App\Http\Controllers\API\Companies\ApiGetCompaniesController;
use App\Http\Controllers\API\Companies\ApiGetCompanyController;
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

        Route::get('categories', ApiGetCategoriesController::class)
            ->name(ApiRoutes::API_GET_CATEGORIES_ROUTE);
        Route::get('categories/{category}', ApiGetCategoryController::class)
            ->name(ApiRoutes::API_GET_CATEGORY_ROUTE);
    }
}
