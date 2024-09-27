<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory($id, array $data)
    {
        $category = Category::find($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return true;
        }
        return false;
    }
}
