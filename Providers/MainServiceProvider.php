<?php

namespace App\Containers\Vendor\Debugger\Providers;

use App\Containers\Vendor\Debugger\Tasks\QueryDebuggerTask;
use App\Containers\Vendor\Documentation\Providers\DebuggerServiceProvider;
use App\Ship\Parents\Providers\MainProvider;
use Jenssegers\Agent\AgentServiceProvider;
use Jenssegers\Agent\Facades\Agent;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends MainProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        AgentServiceProvider::class,
        MiddlewareServiceProvider::class,
	    DebuggerServiceProvider::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        'Agent' => Agent::class
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        app(QueryDebuggerTask::class)->run();
    }
}
