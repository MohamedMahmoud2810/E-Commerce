<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Utils\ImageUpload;

/**
 * Class ProductService.
 */
class ProductService
{
    public $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(){
        return $this->productRepository->getAllProducts();
    }

    public function getById($id){

        return $this->productRepository->getById($id);
    }

    public function store($params){
        if(isset($params['image'])){
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }
        if(isset($params['colors'])){
            $params['color'] = implode(',' , $params['colors']);
            unset($params['colors']);
        }
        if(isset($params['sizes'])){
            $params['size'] = implode(',' , $params['sizes']);
            unset($params['sizes']);
        }

        return $this->productRepository->store($params);
    }

    public function update($id, $params)
    {

        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }

        if(isset($params['colors'])){
            $params['color'] = implode(',' , $params['colors']);
            unset($params['colors']);
        }
        if(isset($params['sizes'])){
            $params['size'] = implode(',' , $params['sizes']);
            unset($params['sizes']);
        }
        return $this->productRepository->update($id, $params);
    }


    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
