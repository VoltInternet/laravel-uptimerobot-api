<?php

    /**
     * Created by Elmar <e.abdurayimov@gmail.com> Abdurayimov
     *
     * @copyright (C)Copyright 2016 elmar.eatech.org
     *               Date: 1/11/16
     *               Time: 2:35 PM
     */

    namespace Akaramires\Monitors\Drivers;

    class UptimerobotDriver extends BaseDriver
    {
        const API_TYPE = 'uptimerobot';

        const API_HOST = 'https://api.uptimerobot.com/v2';

        private function __getEndpoint($endpoint, array $data = [])
        {   
            $params = http_build_query(array_merge($this->__config, $data, ['apiKey' => $this->__apiKey]));
            return '/' . $endpoint . '?' . $params;
        }

        public function getAccountDetails()
        {
            return $this->__request($this->__getEndpoint(__FUNCTION__));
        }

        public function getMonitors($params = [])
        {

            if(!array_key_exists("api_key",$params)) {
                $params = array_merge($params, ['api_key' => $this->__apiKey]);
            }

            $_params = [
                'response_times'      => 1,
                'logs'               => 1,
                'showTimezone'       => 1,
                'all_time_uptime_ratio' => 1,
                'all_time_uptime_durations' => 1
            ];
            $params = array_merge($params, $_params);
            return $this->__request($this->__getEndpoint(__FUNCTION__), 'post', $params);
        }

        public function newMonitor($monitorFriendlyName, $monitorURL, $monitorType, $additionalParams = [])
        {
            $params = array_merge([
                'monitorFriendlyName' => $monitorFriendlyName,
                'monitorURL'          => $monitorURL,
                'monitorType'         => $monitorType,
            ], $additionalParams);

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }

        public function editMonitor($monitorID, $additionalParams = [])
        {
            $params = array_merge([
                'monitorID' => $monitorID,
            ], $additionalParams);

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }

        public function deleteMonitor($monitorID)
        {
            $params = [
                'monitorID' => $monitorID,
            ];

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }

        public function resetMonitor($monitorID)
        {
            $params = [
                'monitorID' => $monitorID,
            ];

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }

        public function getAlertContacts($monitorID=null, $additionalParams = [])
        {
            // Make this one optional
            if($monitorID !== null)
            {
                $params = array_merge([
                    'monitorID' => $monitorID,
                ], $additionalParams);
            }

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }

        public function newAlertContact($alertContactType, $alertContactValue, $additionalParams = [])
        {
            $params = array_merge([
                'alertContactType'  => $alertContactType,
                'alertContactValue' => $alertContactValue,
            ], $additionalParams);

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }

        public function deleteAlertContact($alertContactID, $additionalParams = [])
        {
            $params = array_merge([
                'alertContactID' => $alertContactID,
            ], $additionalParams);

            return $this->__request($this->__getEndpoint(__FUNCTION__, $params));
        }
    }