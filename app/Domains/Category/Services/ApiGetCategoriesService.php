<?php

namespace App\Domains\Category\Services;

use App\Domains\Category\DTOs\CategoryDTO;
use App\Domains\Category\Repositories\ApiCategoriesRepository;
use App\Domains\Contracts\ApiService;

class ApiGetCategoriesService implements ApiService
{

    public function __construct(
        private ?int $companyId
    ) {}

    public function getApiCategoriesRepository() : ApiCategoriesRepository
    {
        return app(ApiCategoriesRepository::class);
    }

    public function handle() : array
    {
        $apiCategoriesRepository = $this->getApiCategoriesRepository();

        $filters = $this->companyId ? ['companyId' =>$this->companyId] : [];
        $categories = $apiCategoriesRepository->getAll($filters);

        return $this->toArray($categories);
    }

    private function toArray(array $categories) : array
    {
        $categoriesArray = [];

        foreach ($categories as $category) {
            $categoriesArray[] = CategoryDTO::toArray($category);
        }

        return $categoriesArray;
    }
}
