<?php

namespace App\Domains\Category\Services;

use App\Domains\Category\DTOs\CategoryDTO;
use App\Domains\Category\Entities\CategoryEntity;
use App\Domains\Category\Repositories\ApiCategoriesRepository;
use App\Contracts\ApiService;

class ApiGetCategoryService implements ApiService
{

    public function getApiCategoriesRepository() : ApiCategoriesRepository
    {
        return app(ApiCategoriesRepository::class);
    }

    public function __construct(
        private int $id
    ) {}

    public function handle() : array
    {
        $apiCategoriesRepository = $this->getApiCategoriesRepository();
        $category = $apiCategoriesRepository->getById($this->id);

        return $this->toArray($category);
    }

    private function toArray(CategoryEntity $category) : array
    {
        return CategoryDTO::toArray($category);
    }
}
