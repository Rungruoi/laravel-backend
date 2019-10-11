<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\MemberService;
use App\Services\ProjectService;
use App\Services\ProjectWithUserService;
use App\Interfaces\MemberServiceInterface;
use App\Interfaces\ProjectServiceInterface;
use App\Interfaces\ProjectWithUserServiceInterface;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MemberServiceInterface::class, MemberService::class);
        $this->app->singleton(ProjectServiceInterface::class, ProjectService::class);
        $this->app->singleton(ProjectWithUserServiceInterface::class, ProjectWithUserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
