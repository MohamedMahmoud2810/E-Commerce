<?php

namespace App\Services;

use App\Utils\ImageUpload;
use App\Repositories\CategoryRepository;

/**
 * Class CategoryService.
 */
class CategoryService
{
    public $CategoryRepository;
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }
    public function getAllCategories()
    {
        return $this->CategoryRepository->getAllCategories();
    }



    public function store($params){
        $params['parent_id'] = $params['parent_id'] ?? 0;
        if(isset($params['image'])){
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }

        return $this->CategoryRepository->store($params);
    }

    public function getById($id , $children = false){
        return $this->CategoryRepository->getByID($id , $children);
    }

    public function update($id , $params){
        $category = $this->CategoryRepository->getById($id);
        if(isset($params['image'])){
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }
        $params['parent_id'] = $params['id'] ?? 0;
        return $this->CategoryRepository->update($category , $params);
    }

    public function delete($params){
        return $this->CategoryRepository->delete($params);
    }
}
