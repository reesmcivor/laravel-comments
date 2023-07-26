<?php

namespace ReesMcIvor\Diary;

use Illuminate\Support\ServiceProvider;

class DiaryPackageServiceProvider extends ServiceProvider
{

    protected $namespace = 'ReesMcIvor\Diary\Http\Controllers';

    protected bool $tenancy;

    public function __construct()
    {
        $this->tenancy = function_exists('tenancy');
    }

    public function boot()
    {
        if($this->app->runningInConsole()) {
            $migrationPath = $this->tenancy ? 'migrations/tenant' : 'migrations';
            $this->publishes([
                __DIR__ . '/../database/migrations/tenant' => database_path($migrationPath),
                __DIR__ . '/../publish/tests' => base_path('tests/Diary'),
                __DIR__ . '/../publish/config' => base_path('config'),
            ], 'reesmcivor-diary');
        }

        $this->mapRoutes();
        $this->loadViewsFrom(__DIR__.'/resources/views', 'diary');
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
