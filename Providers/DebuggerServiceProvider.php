<?php

namespace Apiato\Containers\Debugger\Providers;

use Illuminate\Support\ServiceProvider;

class DebuggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../Configs/vendor-debugger.php' => app_path('Ship/Configs/vendor-debugger.php'),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Configs/vendor-debugger.php', 'vendor-debugger'
        );
    }
}
