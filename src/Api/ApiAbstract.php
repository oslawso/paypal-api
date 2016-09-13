<?php

namespace PaypalApi\Api;

use PaypalApi\HttpClient;
use PaypalApi\SessionManager;

abstract class ApiAbstract
{

    /**
     * The session manager instance.
     *
     * Handles the current session so we can share it throughout
     * the other API classes.
     *
     * @var \PaypalApi\SessionManager
     */
    protected $sessionManager;

    /**
     * The HTTP Client instance.
     *
     * Handles the HTTP requests to the API.
     *
     * @var \PaypalApi\HttpClient
     */
    protected $httpClient;

    /**
     * Create a new API instance.
     *
     * @param \PaypalApi\Api\SessionManager
     * @param \PaypalApi\Api\HttpClient
     */
    public function __construct(SessionManager $sessionManager, HttpClient $httpClient)
    {
        $this->sessionManager = $sessionManager;
        $this->httpClient = $httpClient;
    }

    /**
     * Build the endpoint to the API.
     *
     * @param string
     * @param array
     * @return string
     */
    protected function getEndpoint($path, array $parameters = [])
    {
        $apiUrl = rtrim($this->sessionManager->getApiUrl(), '/');
        $path = ltrim($path, '/');

        // add query string to endpoint.
        if (empty($parameters)) {
            $queryString = '';
        } else {
            $glue = strpos($apiUrl, '?') ? '&' : '?';
            $queryString = sprintf('%s%s', $glue, http_build_query($parameters));
        }

        $endpoint = sprintf('%s/%s%s', $apiUrl, $path, $queryString);

        return $endpoint;
    }
}
