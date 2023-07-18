<?php

namespace App\Repositories;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Utils\ImageUpload;


class ProductRepository implements RepositoryInterface
{
    public $product;
    public $category;
    public function __construct(Product $product , Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function getAllProducts()
    {
//        return $this->product->category->paginate(15);
        return Product::with('category')->paginate(15);
    }

    public function store($params)
    {
        $product = $this->product->create($params);
        $images = $this->uploadMultipleImages($params , $product);
        ProductImage::insert($images);
        return $product;
    }

    private function uploadMultipleImages( $params , $product)
    {
        $images = [];
        if(isset($params['images'])){
            $i=0;
            foreach($params['images'] as $key =>$value){
                $images[$i]['image'] = ImageUpload::uploadImage($value);
                $images[$i]['product_id'] = $product->id;
                $i++;
            }
        }
        return $images;
    }


    public function getById($id)
    {
        return $this->product->with('images')->where('id' , $id)->firstOrFail();
    }

    public function update($id, $params)
    {
        $product = $this->getById($id);
        $product->update($params);
        $images = $this->uploadMultipleImages($params, $product);
        ProductImage::insert($images);
        return $product;
    }



    public function delete($id)
    {
        $product = $this->getById($id);
        return $product->delete();
    }


}
