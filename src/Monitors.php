<?php
    /**
     * Created by Volt Internet
     *
     * @copyright (C)Copyright 2018 voltinternet.nl
     */

    namespace Voltinternet\Monitors;

    use Voltinternet\Monitors\Drivers\BaseDriver;
    use Exception;

    class Monitors
    {
        /**
         * @param $driver
         * @param $params
         *
         * @return mixed|BaseDriver
         */
        public function createDriver($driver, $params)
        {
            try {
                $driverName = '\Voltinternet\Monitors\Drivers\\' . ucfirst(strtolower($driver)) . "Driver";
                return new $driverName($params['api_key']);
            } catch (Exception $e) {
                throw new \InvalidArgumentException('Invalid Monitor driver');
            }
        }

    }