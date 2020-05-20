<?php

namespace App\Components\Repositories;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use App\Components\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductContract
{

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Product|mixed
     */
    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);

            $status = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('status'));

            $product = new Product($merge->all());

            $product->save();

            return $product;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }
    /**
     * @param array $data
     * @param product
     * @return mixed
     */
    public function createProductAttributes($id,$data)
    {
        try {
            $product=$this->findProductById($id);
            foreach($data['color'] as $key =>$value){
                $product->attributes()->create([
                    'options'=>array(
                        'color'=>$value,
                        'size'=>$data['size'][$key]
                    ),
                    'price'=>$data['price'][$key],
                    'sale_price'=>$data['sale_price'][$key],
                    'sku'=>$data['sku'][$key],
                    'stock'=>$data['stock'][$key]
                ]);
            }
            return true;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct($id, $params)
    {
        $product = $this->findProductById($id);

        $collection = collect($params)->except('_token');

        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('status'));

        $product->update($merge->all());

        return $product;
    }

        public function updateProductAttributes($id, $params)
    {
        $product = $this->findProductById($id);

        $product->attributes()->delete();

        $productAttribute = $this->createProductAttributes($id, $params);

        return $productAttribute;
    }
    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);
        $product->attributes()->delete();
        $product->delete();
        return $product;
    }


}
