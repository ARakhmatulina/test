<?php

namespace App\Domains\Category\Repositories;

use App\Domains\Category\DTOs\CategoryDTO;
use App\Domains\Category\Entities\CategoryEntity;
use App\Domains\Contracts\ApiRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class ApiCategoriesRepository implements ApiRepository
{

    public function getAll(array $filters = []) : array
    {
        $categories = Category::query();
        $this->applyFilters($categories, $filters);

        $categoriesEntities = [];
        foreach ($categories->get() as $category) {
            $categoriesEntities[] = CategoryDTO::fromModel($category);
        }

        return $categoriesEntities;
    }

    public function getById(int $id) : CategoryEntity
    {
        $category = Category::find($id);

        return CategoryDTO::fromModel($category);
    }

    private function applyFilters(Builder $query, array $filters) : void
    {
        if (isset($filters['companyId'])) {
            $query->where('company_id', $filters['companyId']);
        }
    }
}
