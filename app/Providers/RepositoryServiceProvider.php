<?php

namespace App\Providers;

use App\Interfaces\CollegeDashboardInterface;
use App\Interfaces\StudentDashboardInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\UniversityDashboardInterface;
use App\Repositories\CollegeDashboardRepository;
use App\Repositories\StudentDashboardRepository;
use App\Repositories\StudentRepository;
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
        $this->app->bind(CollegeDashboardInterface::class, CollegeDashboardRepository::class);
        $this->app->bind(StudentDashboardInterface::class, StudentDashboardRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);
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
