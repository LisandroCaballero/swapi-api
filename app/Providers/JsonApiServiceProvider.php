<?php

namespace App\Providers;

use App\JsonApi\JsonApiQueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class JsonApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \ReflectionException
     */
    public function boot()
    {
        Builder::mixin(new JsonApiQueryBuilder());
    }
}
