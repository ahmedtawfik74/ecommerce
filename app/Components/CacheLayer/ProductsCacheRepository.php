<?php

namespace App\Components\CacheLayer;

use App\Models\Product;
use Illuminate\Cache\CacheManager;
use App\Components\Contracts\ProductContract;
use App\Components\Repositories\ProductRepository;

class ProductsCacheRepository implements ProductContract
{
    protected $productRepository;

    protected $cache;

    const TTL = 1440; # 1 day

    public function __construct(CacheManager $cache, ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
        $this->cache = $cache;
    }

    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) {
        return $this->cache->remember('products', self::TTL, function () {
            return $this->productRepository->listProducts($order = 'id',$sort = 'desc',$columns = ['*']);
        });
    }

    public function findProductById($id)
    {
        return $this->productRepository->findProductById($id);
    }
    public function createProduct($params)
    {
        return $this->productRepository->createProduct($params);
    }
    public function createProductAttributes($id,$data)
    {
        return $this->productRepository->createProductAttributes($id,$data);
    }
    public function updateProduct($id , $params)
    {
        return $this->productRepository->updateProduct($id, $params);
    }

    public function updateProductAttributes($id , $params)
    {
        return $this->productRepository->updateProductAttributes($id , $params);
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }

}