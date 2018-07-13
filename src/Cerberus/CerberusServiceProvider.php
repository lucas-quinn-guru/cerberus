<?php

namespace LucasQuinnGuru\Cerberus;

/**
 * This file is part of Cerberus,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package LucasQuinnGuru\Cerberus
 */

use Illuminate\Support\ServiceProvider;

class CerberusServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/config.php' => app()->basePath() . '/config/cerberus.php',
        ]);

        // Register commands
        $this->commands('command.cerberus.migration');

        // Register blade directives
        $this->bladeDirectives();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCerberus();

        $this->registerCommands();

        $this->mergeConfig();
    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        if (!class_exists('\Blade')) {
            return;
        }

        // Call to Cerberus::hasRole
        \Blade::directive('role', function ($expression) {
            return "<?php if (\\Cerberus::hasRole({$expression})) : ?>";
        });

        \Blade::directive('endrole', function ($expression) {
            return "<?php endif; // Cerberus::hasRole ?>";
        });

        // Call to Cerberus::can
        \Blade::directive('permission', function ($expression) {
            return "<?php if (\\Cerberus::can({$expression})) : ?>";
        });

        \Blade::directive('endpermission', function ($expression) {
            return "<?php endif; // Cerberus::can ?>";
        });

        // Call to Cerberus::ability
        \Blade::directive('ability', function ($expression) {
            return "<?php if (\\Cerberus::ability({$expression})) : ?>";
        });

        \Blade::directive('endability', function ($expression) {
            return "<?php endif; // Cerberus::ability ?>";
        });
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerCerberus()
    {
        $this->app->bind('cerberus', function ($app) {
            return new Cerberus($app);
        });

        $this->app->alias('cerberus', 'LucasQuinnGuru\Cerberus\Cerberus' );
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.cerberus.migration', function ($app) {
            return new MigrationCommand();
        });
    }

    /**
     * Merges user's and cerberus' configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php',
            'cerberus'
        );
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.cerberus.migration'
        ];
    }
}
