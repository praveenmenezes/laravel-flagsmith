<?php
namespace Menezes\LaravelFlagsmith\Providers;

use Flagsmith\Flagsmith;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class FlagsmithServiceProvider extends ServiceProvider {

    private $config;

    /**
     * Setup the config.
     *
     * @param  \Illuminate\Contracts\Container\Container $app
     * @return void
     */
    protected function setupConfig(Container $app) {
        $source = realpath($raw = __DIR__ . '/../../config/flagsmith.php') ?: $raw;
        $this->mergeConfigFrom($source, 'flagsmith');
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot() {
        $this->setupConfig($this->app);

        $config = $this->app->config->get("flagsmith");

        $this->app->bind(Flagsmith::class, function () use ($config) {
            return new Flagsmith(
                $config["api_key"],
                $config["api_url"]
            );
        });
    }
}
