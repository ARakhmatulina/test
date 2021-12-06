<?php

namespace App\Domains\Category\DTOs;

use App\Domains\Category\Entities\CategoryEntity;
use App\Models\Category;

class CategoryDTO
{

    public static function fromModel(Category $category) : CategoryEntity
    {
        return new CategoryEntity(
            id: $category->id,
            name: $category->name
        );
    }

    public static function toArray(CategoryEntity $categoryEntity) : array
    {
        return [
            'id' => $categoryEntity->getId(),
            'name' => $categoryEntity->getName()
        ];
    }
}
