<?php

namespace App\Domains\Company\Services;

use App\Domains\Company\DTOs\CompanyDTO;
use App\Domains\Company\Entities\CompanyEntity;
use App\Domains\Company\Repositories\ApiCompaniesRepository;
use App\Domains\Contracts\ApiService;

class ApiGetCompanyService implements ApiService
{

    public function __construct(
        private int $id
    ) {}

    private function getApiCompaniesRepository() : ApiCompaniesRepository
    {
        return app(ApiCompaniesRepository::class);
    }

    public function handle() : array
    {
        $apiCompaniesRepository = $this->getApiCompaniesRepository();
        $companyEntity = $apiCompaniesRepository->getById($this->id);

        return $this->toArray($companyEntity);
    }

    private function toArray(CompanyEntity $companyEntity) : array
    {
        return CompanyDTO::toArray($companyEntity);
    }
}
