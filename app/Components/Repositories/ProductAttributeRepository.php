<?php

namespace App\Components\Repositories;

use App\Models\ProductAttribute;
use App\Components\Contracts\ProductAttributeContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProductAttributeRepository extends BaseRepository implements ProductAttributeContract
{
    /**
     * AttributeRepository constructor.
     * @param Attribute $model
     */
    public function __construct(ProductAttribute $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findAttributeById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }


    public function deleteAttribute($id)
    {
        $attribute = $this->findAttributeById($id);

        $attribute->delete();

        return $attribute;
    }
}
