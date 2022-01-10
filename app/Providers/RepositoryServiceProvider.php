<?php

namespace App\Providers;

use App\Interfaces\UniversityDashboardInterface;
use App\Repositories\UniversityDashboardRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UniversityDashboardInterface::class, UniversityDashboardRepository::class);
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
