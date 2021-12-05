<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\DTOs\CompanyDTO;
use App\Domains\Company\Repositories\ApiCompaniesRepository;
use App\Domains\Contracts\ApiService;

class ApiGetCompaniesService implements ApiService
{

    public function getApiCompaniesRepository() : ApiCompaniesRepository
    {
        return app(ApiCompaniesRepository::class);
    }

    public function handle() : array
    {
        $apiCompaniesRepository = $this->getApiCompaniesRepository();
        $companiesEntities = $apiCompaniesRepository->getAll();

        return $this->toArray($companiesEntities);
    }

    private function toArray(array $companiesEntities) : array
    {
        $companiesArray = [];
        foreach ($companiesEntities as $companiesEntity) {
            $companiesArray[] = CompanyDTO::toArray($companiesEntity);
        }

        return $companiesArray;
    }
}
