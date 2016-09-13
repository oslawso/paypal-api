<?php

namespace PaypalApi;

class SessionManager
{
    /**
     * The API URL.
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * The Access token.
     *
     * @var string
     */
    protected $accessToken;

    /**
     * The Access token.
     *
     * @var string
     */
    protected $tokenType;

    /**
     * Constructor.
     *
     * @param string
     */
    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * Get API URL.
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Set Access token.
     *
     * @param string
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Get Access token.
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set Access token.
     *
     * @param string
     */
    public function setTokenType($tokenType)
    {
        $this->tokenType = $tokenType;
    }

    /**
     * Get Access token.
     *
     * @return string
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * Builds authorization header string.
     *
     * @return string
     */
    public function getAuthorizationHeaderString()
    {
        $header = sprintf('Authorization: %s %s', $this->getTokenType(), $this->getAccessToken());

        return $header;
    }
}
