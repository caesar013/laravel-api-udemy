<?php

namespace App\Providers;

use App\Http\Resources\QuoteResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // this way, the response will not be wrapped with "data" key
        QuoteResource::withoutWrapping();

        // or you can use the following to remove the wrapping for all resources
        JsonResource::withoutWrapping();
    }
}
