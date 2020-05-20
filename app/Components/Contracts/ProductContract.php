<?php

namespace App\Components\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface ProductContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProduct(array $params);

    /**
     * @param array $data
     * @param $product
     * @return mixed
     */
    public function createProductAttributes($id,$data);
    /**
     * @param array $params
     * @return mixed
     */

    public function updateProduct($id , $params);

    /**
     * @param array $params
     * @param $id
     * @return mixed
     */

    public function updateProductAttributes($id , $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProduct($id);

}
