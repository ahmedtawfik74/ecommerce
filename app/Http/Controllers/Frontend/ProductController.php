<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Components\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;

class ProductController extends BaseController
{
    protected $productRepository;

    public function __construct(
        ProductContract $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();
        $this->setPageTitle('Products', 'Products List');
        return view('frontend.products.index', compact('products'));
    }

    public function create()
    {
        $this->setPageTitle('Products', 'Create Product');
        return view('frontend.products.create');
    }

    public function store(StoreProductFormRequest $request)
    {
        $data = $request->except('_token');
        $product_data = $request->only('name','code','status','description','slug');
        $product = $this->productRepository->createProduct($product_data);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        if($request->has('color'))
        {
            $product_attributes = $this->productRepository->createProductAttributes($product->id,$data);
        }
        return $this->responseRedirect('products.index', 'Product added successfully' ,'success',false, false);
    }

    public function show($id)
    {
        $product = $this->productRepository->findProductById($id);

        $this->setPageTitle('Products', 'Product Info');
        return view('frontend.products.show',[
                'product'=>$product,
                'attributes'=>$product->attributes
            ]);
    }
    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $this->setPageTitle('Products', 'Edit Product');
        return view('frontend.products.edit',[
            'product'       =>$product,
            'attributes'    =>$product->attributes
        ]);
    }

    public function update($id,StoreProductFormRequest $request)
    {
        $data = $request->except('_token');

        $product_data = $request->only('name','code','status','description','slug');

        $product = $this->productRepository->updateProduct($id,$product_data);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        if($request->has('color'))
        {
            $product_attributes = $this->productRepository->updateProductAttributes($id,$data);
        }

        return $this->responseRedirect('products.index', 'Product updated successfully' ,'success',false, false);
    }

    public function delete($id)
    {
        $product = $this->productRepository->deleteProduct($id);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while deleting attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Product deleted successfully.', 'success',false, false);
    }

}
