<?php
    /**
     * Created by Volt Internet
     *
     * @copyright (C)Copyright 2018 voltinternet.nl
     */

    namespace VoltInternet\Monitors\Facades;

    use Illuminate\Support\Facades\Facade;

    class Monitors extends Facade
    {
        /**
         * Get the registered name of the component.
         *
         * @return string
         */
        protected static function getFacadeAccessor()
        {
            return 'uptimerobot';
        }
    }
