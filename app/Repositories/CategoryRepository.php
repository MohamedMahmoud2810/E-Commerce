<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllCategories()
    {
        return $this->category->paginate(10);
    }

    public function store($params){
        return $this->category->create($params);
    }

    public function getById($id , $childrenCount = false){
        $query =  $this->category->where('id' , $id);
        if($childrenCount){
            $query->withCount('child');
        }
        return $query->firstOrFail();
    }

    public function update($category , $params){
        return $category->update($params);
    }

    public function delete($id){
        return Category::find($id)->delete();
    }
}
