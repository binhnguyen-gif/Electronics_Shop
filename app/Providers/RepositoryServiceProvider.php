<?php

namespace App\Providers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProducerRepositoryInterface;
use App\Interfaces\SliderRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProducerRepository;
use App\Repositories\SliderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProducerRepositoryInterface::class, ProducerRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
