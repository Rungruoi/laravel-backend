<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\MemberService;
use App\Services\ProjectService;
use App\Services\ProjectWithMemberService;
use App\Interfaces\MemberServiceInterface;
use App\Interfaces\ProjectServiceInterface;
use App\Interfaces\ProjectWithMemberServiceInterface;




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
        $this->app->singleton(ProjectWithMemberServiceInterface::class, ProjectWithUserService::class);
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
