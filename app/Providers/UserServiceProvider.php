<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use App\Services\Implementation\UserServiceImplementation;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [UserService::class => UserServiceImplementation::class];

    public function provides()
    {
        return [UserService::class];
    }

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
     */
    public function boot()
    {
        //
    }
}
