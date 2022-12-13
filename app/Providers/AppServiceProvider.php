<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\SliderRepository;
use App\Interfaces\SliderRepositoryInterface;
use App\Services\UploadImage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        // $this->app->bind(UploadImage::class);

        Paginator::defaultView('common.pagination');
    }
}
