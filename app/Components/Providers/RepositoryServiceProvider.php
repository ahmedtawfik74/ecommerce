<?php

namespace App\Components\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Components\Contracts\ProductAttributeContract;
use App\Components\Repositories\ProductAttributeRepository;
use App\Components\Contracts\ProductContract;
use App\Components\Repositories\ProductRepository;
use App\Components\CacheLayer\ProductsCacheRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        ProductAttributeContract::class  =>    ProductAttributeRepository::class,
        ProductContract::class          =>          ProductsCacheRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
