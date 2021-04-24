<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Generator;
use Bezhanov\Faker\ProviderCollectionHelper;

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
		$faker = $this->app->make(Generator::class);
		ProviderCollectionHelper::addAllProvidersTo($faker);
    }
}
