<?php

namespace App\Bootstrap;

use Slim\App;
use Tightenco\Collect\Support\Collection;

class ApplicationManager
{
    /** @var \Slim\App $app The Slim application */
    protected $app;

    /** @var \Slim\Container $app The Slim application container */
    protected $container;

    /** @var array Array of application providers */
    protected $providers = [
        \App\Providers\MiddlewareProvider::class,
        \App\Providers\RoutesProvider::class
    ];

    /** @var array Array of application services */
    protected $services = [
        \App\Services\ViewService::class
    ];

    /**
     * Bootstrap the application.
     *
     * @param string $app Path to application root directory
     *
     * @return \App\Slim The Slim application
     */
    public function __invoke(App $app)
    {
        $this->app = $app;
        $this->container = $app->getContainer();

        $this->registerServices();
        $this->registerProviders();
        $this->bootServices();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    protected function registerServices()
    {
        Collection::make($this->services)->each(function ($service) {
            $service = new $service($this->container);
            $service->register();
        });
    }

    /**
     * Register the application providers.
     *
     * @return void
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            call_user_func(new $provider, $this->app);
        }
    }

    /**
     * Boot the application services.
     *
     * @return void
     */
    protected function bootServices()
    {
        Collection::make($this->services)->each(function ($service) {
            $service = new $service($this->container);
            $service->boot();
        });
    }
}
