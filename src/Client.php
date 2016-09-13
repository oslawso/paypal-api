<?php

namespace PaypalApi;

use PaypalApi\Api\Authentication;

class Client
{
    /**
     * The session manager instance.
     *
     * Handles the current session so we can share it throughout
     * the other API classes.
     *
     * @var \PaypalApi\SessionManager
     */
    private $sessionManager;

    /**
     * The HTTP Client instance.
     *
     * Handles the HTTP requests to the API.
     *
     * @var \PaypalApi\HttpClient
     */
    private $httpClient;

    /**
     * Create a new API client instance.
     *
     * @param string
     */
    public function __construct($apiUrl)
    {
        if (empty($apiUrl)) {

            throw new \Exception('Missing required argument $apiUrl (Paypal API URL).');
        }

        $this->sessionManager = new SessionManager($apiUrl);
        $this->httpClient = new HttpClient();
    }

    /**
     * Get the Authentication.
     *
     * @return \PaypalApi\Api\Authentication
     */
    public function authentication()
    {
        return new Authentication($this->sessionManager, $this->httpClient);
    }
}
