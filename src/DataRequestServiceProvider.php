<?php

namespace Arshidkv12\DataRequest;

use Illuminate\Support\ServiceProvider;
use Arshidkv12\DataRequest\Console\MakeDataRequestCommand;

class DataRequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->commands([
            MakeDataRequestCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/Console/stubs/datarequest.stub' => base_path('stubs/datarequest.stub'),
        ], 'datarequest-stubs');
    }
}
