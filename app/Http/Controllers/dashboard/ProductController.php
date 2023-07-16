<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\DeleteProductRequest;
use App\Http\Requests\Dashboard\Products\StoreProductRequest;
use App\Http\Requests\Dashboard\Products\UpdateProductRequest;
use App\Models\ProductImage;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    public $productService;
    public $categoryService;

    //create constructor

    public function __construct(ProductService $productService , CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        if ($products === null) {
            $message = "No products are available.";
            return view('dashboard.products.index', compact('message'));
        } else {
            return view('dashboard.products.index', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.products.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->store($request->validated());
        return redirect()->route('dashboard.product.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->getById($id);
        $categories = $this->categoryService->getAllCategories();
        $selectedSizes = explode(',', $product->size);
        $selectedColors = explode(',', $product->color);
        $uploadedImages = ProductImage::where('product_id', $id)->get();
        return view('dashboard.products.edit' , [
            'product' => $product,
            'categories' => $categories,
            'selectedSizes' => $selectedSizes,
            'selectedColors' => $selectedColors,
            'uploadedImages' => $uploadedImages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->productService->update($id,$request->all());
        return redirect()->route('dashboard.product.index' , $id)->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request, $id)
    {
        $this->productService->delete($id);
        return redirect()->route('dashboard.product.index');
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

}
