<?php

namespace App\Providers;

use App\Http\Controllers\DataController;
use App\Http\Controllers\JobController;
use App\Http\Middleware\ForceJsonResponse;
use Base\Http\Middleware\IsGroupInviteBelongToGroup;
use Base\Http\Middleware\IsGroupInviteNotCanceled;
use Base\Http\Middleware\IsGroupInviteNotEmbedded;
use DocumentFlow\Http\Middleware\Document\IsGroupOwner;
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
    
                $router->put('data', DataController::class);
                
                $router->get('jobs', JobController::class);
            });
    }
}
