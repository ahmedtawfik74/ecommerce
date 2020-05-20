<?php

namespace App\Components\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface ProductAttributeContract
{

    /**
     * @param int $id
     * @return mixed
     */
    public function findAttributeById(int $id);

    public function deleteAttribute($id);

}
