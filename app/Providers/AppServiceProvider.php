<?php

namespace App\Providers;

use App\Contracts\ImageContract;
use App\Contracts\ImageTaggingContract;
use App\Contracts\TagsContract;
use App\Services\ImageService;
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

        $this->app->singleton(ImageContract::class, function ($app) {
            $perPage = config('paginations.images.per_page');

            return new ImageService($perPage, $app[TagsContract::class]);
        });
        $this->app->alias(ImageContract::class, ImageTaggingContract::class);
    }
}
