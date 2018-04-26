## Laravel 5 UptimeRobot API v2

## Installation

Please check the system requirements before installing Laravel UptimeRobot API.

To get the latest version of Laravel UptimeRobot v2 API, simply require `"voltinternet/laravel-uptimerobot-api": "*"` in your `composer.json` file.

Open up `app/config/app.php` and add the following to the `providers` key.

* `Voltinternet\Monitors\MonitorsServiceProvider::class`

Also add the following to the `aliases` key:

* `'Monitors' => Voltinternet\Monitors\Facades\Monitors::class`

## Configuration

Laravel UptimeRobot v2 API requires configuration.

To get started, first publish the package config file:

    php artisan vendor:publish --provider="Voltinternet\Monitors\MonitorsServiceProvider"