<?php

namespace App\Providers;

use App\Contracts\ImagesContract;
use App\Contracts\ImageTaggingContract;
use App\Contracts\TagsContract;
use App\Services\ImagesService;
use App\Services\TagService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsContract::class, function () {
            $perPage = config('paginations.tags.per_page');

            return new TagService($perPage);
        });

        $this->app->singleton(ImagesContract::class, function ($app) {
            $perPage = config('paginations.images.per_page');

            return new ImagesService($perPage, $app[TagsContract::class]);
        });
        $this->app->alias(ImagesContract::class, ImageTaggingContract::class);
    }
}
