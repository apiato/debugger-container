<?php

namespace Apiato\Containers\Debugger\Providers;

use Apiato\Containers\Debugger\Tasks\QueryDebuggerTask;
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

        app(QueryDebuggerTask::class)->run();
    }
}
