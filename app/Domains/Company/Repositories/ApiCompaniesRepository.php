<?php

namespace App\Domains\Company\Repositories;

use App\Domains\Company\DTOs\CompanyDTO;
use App\Domains\Company\Entities\CompanyEntity;
use App\Contracts\ApiRepository;
use App\Models\Company;

class ApiCompaniesRepository implements ApiRepository
{

    public function getAll(array $filters = []) : array
    {
        $companies = Company::all();

        $companiesEntities = [];
        foreach ($companies as $company) {
            $companiesEntities[] = CompanyDTO::fromModel($company);
        }

        return $companiesEntities;
    }

    public function getById(int $id) : CompanyEntity
    {
        $company = Company::find($id);

        return CompanyDTO::fromModel($company);
    }
}
