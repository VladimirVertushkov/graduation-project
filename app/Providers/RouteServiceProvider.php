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
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapEntityRoutes('users');
        $this->mapEntityRoutes('auth');
        $this->mapEntityRoutes('countries');
        $this->mapEntityRoutes('competitions');
        $this->mapEntityRoutes('groups');
        $this->mapEntityRoutes('matches');
        $this->mapEntityRoutes('forecasts');
        //$this->mapEntityRoutes('commands');
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    private function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    private function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    private function mapEntityRoutes(string $entityName)
    {
        $lowercase = strtolower($entityName);
        $camelCase = ucfirst($entityName);


        Route::prefix('api/'.$lowercase)
            ->middleware('web')
            ->namespace('App\Entities\\'.$camelCase.'\Http\Controllers')
            ->group(app_path('Entities/'.$camelCase.'/Http/Routes/'.$lowercase.'.php'));
    }
}
