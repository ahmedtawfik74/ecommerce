<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Components\Contracts\ProductAttributeContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ProductAttributeRequest;
use App\Components\Contracts\ProductContract;


class ProductAttributeController extends BaseController
{
    protected $productAttributeRepository;
    protected $productRepository;
    /**
     * AttributeController constructor.
     * @param AttributeContract $attributeRepository
     */
    public function __construct(ProductAttributeContract $productAttributeRepository,ProductContract $productRepository)
    {
        $this->productAttributeRepository = $productAttributeRepository;
        $this->productRepository = $productRepository;
    }

    public function store(ProductAttributeRequest $request)
    {
        $data = $request->except('_token');
        if($request->has('color'))
        {
            $product_id =$data['product_id'];
            $product_attributes = $this->productRepository->createProductAttributes($product_id,$data);
        }
        return $this->responseRedirectBack('Attributes added successfully.', 'error', false, false);
    }
    
    public function delete($id)
    {
        $productAttribute = $this->productAttributeRepository->deleteAttribute($id);


        if (!$productAttribute) {
            return $this->responseRedirectBack('Error occurred while deleting attribute.', 'error', true, true);
        }
        return $this->responseRedirectBack('Attribute deleted successfully.', 'success',false, false);
    }
}
