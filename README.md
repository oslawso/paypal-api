# Paypal API SDK for PHP
A library for accessing financial data from
[Paypal API](https://developer.yodlee.com/Yodlee_API). Built for easier
integration with Laravel PHP Framework as a dependency.

## Code Example
```php
<?php
// NOTE: This script assumes installation with composer and using composer's autoloader.
require_once 'vendor/autoload.php';

// Minimum required Paypal credentials.
$yodleeApiUrl = 'https://developer.api.yodlee.com/ysl/restserver/v1';
$yodleeApiCobrandLogin = 'johndoe';
$yodleeApiCobrandPassword = 'johndoe#123';

// Create a new instance of the SDK.
$yodleeApi = new \YodleeApi\Client($yodleeApiUrl);

// Login the cobrand.
$yodleeApi->cobrand()->login($yodleeApiCobrandLogin, $yodleeApiCobrandPassword);

// Fetch all available banks, institutions etc. that are supported by Yodlee.
$providers = $yodleeApi->providers()->get();
```