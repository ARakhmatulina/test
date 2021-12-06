<?php

namespace App\Domains\Company\DTOs;

use App\Domains\Company\Entities\CompanyEntity;
use App\Models\Company;

class CompanyDTO
{

    public static function fromModel(Company $company) : CompanyEntity
    {
        return new CompanyEntity(
            id: $company->id,
            name: $company->name,
            description: $company->description
        );
    }

    public static function toArray(CompanyEntity $companyEntity) : array
    {
        return [
            'id' => $companyEntity->getId(),
            'name' => $companyEntity->getName(),
            'description' => $companyEntity->getDescription()
        ];
    }
}
