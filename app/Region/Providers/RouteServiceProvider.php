<?php

namespace App\Region\Providers;

use App\Region\Http\Controllers\Data\DeleteAction;
use App\Region\Http\Controllers\Data\GetAction;
use App\Region\Http\Controllers\Data\PutAction;
use App\Region\Http\Controllers\JobController;
use App\Base\Http\Middleware\ForceJsonResponse;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::get('/', function () {
                return view('welcome');
            });
        });
    
        /**
         * @var Router $router
         */
        $router = $this->app->make('router');
    
        $router->middleware([ForceJsonResponse::class])
            ->group(function () use ($router) {
    
                $router->put('data', PutAction::class);
                $router->get('data', GetAction::class);
                $router->delete('data', DeleteAction::class);
    
                $router->get('jobs', JobController::class);
            });
    }
}
