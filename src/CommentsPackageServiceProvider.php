<?php

namespace ReesMcIvor\Comments;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CommentsPackageServiceProvider extends ServiceProvider
{

    protected $namespace = 'ReesMcIvor\Comments\Http\Controllers';

    protected bool $tenancy;

    public function boot()
    {
        $this->tenancy = function_exists('tenancy');
        if($this->app->runningInConsole()) {
            $migrationPath = $this->tenancy ? 'migrations/tenant' : 'migrations';
            $this->publishes([
                __DIR__ . '/../database/migrations/tenant' => database_path($migrationPath),
                __DIR__ . '/../publish/tests' => base_path('tests/Comments'),
                //__DIR__ . '/../publish/config' => base_path('config'),
            ], 'reesmcivor-comments');
        }

        $this->loadViewsFrom(__DIR__.'/resources/views', 'comments');
    }

    public function map() 
    {
        $this->mapRoutes();
    }

    protected function mapRoutes()
    {
        Route::middleware(array_filter(['web', $this->tenancy ? 'tenant' : null]))
            ->namespace($this->namespace)
            ->group($this->modulePath('routes/tenant.php'));
    }

    private function modulePath($path)
    {
        return __DIR__ . '/../../' . $path;
    }
}
