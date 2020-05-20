<?php

namespace App\Filters;
use App\Filters\Filters;
use App\Models\Product;

class ProductFilters extends Filters
{
	protected $filters = ['search'];

	protected function search($username)
	{
		return $this->builder->where('name','like','%'.$request->search.'%')->orWhere('code','like','%'.$request->search.'%');
	}

}
