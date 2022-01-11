<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/university/dashboard';
    public const COLLEGE = '/college/dashboard';
    public const STUDENT = '/student/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';
    protected $namespace_university = 'App\\Http\\Controllers\\University';
    protected $namespace_college = 'App\\Http\\Controllers\\College';
    protected $namespace_student = 'App\\Http\\Controllers\\Student';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('university')
                ->middleware('web')
                ->as('university.')
                ->namespace($this->namespace_university)
                ->group(base_path('routes/university.php'));

            Route::prefix('college')
                ->middleware('web')
                ->as('college.')
                ->namespace($this->namespace_college)
                ->group(base_path('routes/college.php')); 
                
            Route::prefix('student')
                ->middleware('web')
                ->as('student.')
                ->namespace($this->namespace_student)
                ->group(base_path('routes/student.php'));     
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
