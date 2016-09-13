<?php

namespace PaypalApi\Api;

class Authentication extends ApiAbstract
{
    /**
     * Authenticate to get access token.
     *
     * @param string
     * @param string
     * @return bool
     */
    public function getToken($login, $password)
    {
        $url = $this->getEndpoint('/oauth2/token');

        $response = $this->httpClient->post($url, ['grant_type' => 'client_credentials'], ['content-type: application/json'], $login . ":" . $password);

        $response = json_decode($response);

        if (empty($response->access_token)) {

            return false;
        }

        $this->sessionManager->setAccessToken(
            $response->access_token
        );

        $this->sessionManager->seTokenType(
            $response->token_type
        );

        return true;
    }

}
