<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\MemberInterface;
use App\Services\MemberService;

class MemberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MemberInterface::class, MemberService::class);
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
