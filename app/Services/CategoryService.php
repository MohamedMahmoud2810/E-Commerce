<?php

namespace App\Services;

use App\Http\Requests\Dashboard\Categories\CategoryStoreRequest;
use App\models\Category;
use Yajra\DataTables\Facades\DataTables;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;

/**
 * Class CategoryService.
 */
class CategoryService
{
    public function getAllCategories()
    {
        return Category::paginate(15);
    }

    public function store($params){
        $params['parent_id'] = $params['id'] ?? 0;
        return Category::create($params);
    }

    public function getById($id , $children = false){
        $query =  Category::where('id' , $id);
        if($children){
            $query->withCount('child');
        }
        return $query->firstOrFail();
    }

    public function update($id , $params){
        $category = $this->getById($id);
        $params['parent_id'] = $params['id'] ?? 0;
        return $category->update($params);
    }
}
