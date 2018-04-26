<?php
    /**
     * Created by Volt Internet
     *
     * @copyright (C)Copyright 2018 voltinternet.nl
     */
    namespace VoltInternet\Monitors;

    use Illuminate\Support\ServiceProvider;

    class MonitorsServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap the application services.
         *
         * @return void
         */
        public function boot()
        {
            $this->publishes([
                __DIR__ . '/../config/monitors.php' => config_path('monitors.php'),
            ]);
        }

        /**
         * Register the application services.
         *
         * @return void
         */
        public function register()
        {
            $this->app->singleton('uptimerobot', function ($app, $params) {
                $params['api_key'] = config('monitors.uptimerobot.api_key');
                return (new Monitors())->createDriver('uptimerobot', $params);
            });
        }

        /**
         * Require composer's autoload file the packages.
         *
         * @return void
         **/
        protected function loadAutoloader($path)
        {
        }
    }
