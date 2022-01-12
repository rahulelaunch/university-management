<?php

namespace App\Providers;

use App\Interfaces\CollegeCourseInterface;
use App\Interfaces\CollegeDashboardInterface;
use App\Interfaces\CollegeMeritInterface;
use App\Interfaces\CommonSettingInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\MeritRoundInterface;
use App\Interfaces\StudentDashboardInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\UniversityDashboardInterface;
use App\Repositories\CollegeCourseRepository;
use App\Repositories\CollegeDashboardRepository;
use App\Repositories\CollegeMeritRepository;
use App\Repositories\CommonSettingRepository;
use App\Repositories\CourseRepository;
use App\Repositories\MeritRoundRepository;
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
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(CommonSettingInterface::class, CommonSettingRepository::class);
        $this->app->bind(MeritRoundInterface::class, MeritRoundRepository::class);
        $this->app->bind(CollegeCourseInterface::class, CollegeCourseRepository::class);
        $this->app->bind(CollegeMeritInterface::class, CollegeMeritRepository::class);
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
