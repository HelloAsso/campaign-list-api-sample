<?php

    class ApiWrapper
    {
        private $organism;
        private $token;
        
        public function __construct($config)
        {
            $this->organism = $config->organismUrl;
            $this->initToken($config->clientId, $config->clientSecret);
        }

        private function initToken($clientId, $clientSecret)
        {
            $request = new HTTP_Request2();
            $request->setUrl('https://api.helloasso.com/oauth2/token'); 
            $request->setMethod(HTTP_Request2::METHOD_POST);
            $request->setHeader(array(
                'Content-Type' => 'application/x-www-form-urlencoded',
            ));
            $request->addPostParameter(array(
                'grant_type' => 'client_credentials',
                'client_id' => $clientId,
                'client_secret' => $clientSecret
            ));

            try
            {
                $response = $request->send();
                if ($response->getStatus() == 200) {
                    $this->token = json_decode($response->getBody());
                }
                else {
                    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' . $response->getReasonPhrase();
                }
            }
            catch(HTTP_Request2_Exception $e)
            {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function getForms()
        {
            $request = new HTTP_Request2();
            $request->setUrl('https://api.helloasso.com/v5/organizations/' . $this->organism . '/forms?pageIndex=1&pageSize=20');
            $request->setMethod(HTTP_Request2::METHOD_GET);
            $request->setHeader(array(
                'authorization' => 'Bearer ' . $this->token->access_token,
            ));

            try
            {
                $response = $request->send();
                if ($response->getStatus() == 200) {
                    return json_decode($response->getBody())->data;
                }
                else {
                    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
                }
            }
            catch(HTTP_Request2_Exception $e)
            {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

?>