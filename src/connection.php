<?php

require_once __DIR__ . '/../vendor/autoload.php';
use MongoDB\Driver\ServerApi;

require_once 'config.php';

Abstract Class Connection
{   
    protected object $client;

    public function __construct()
    {
        $apiVersion = new ServerApi(ServerApi::V1);
        $this->client = new MongoDB\Client(
            DBConfig::URL_MONGO, [], 
            ['serverApi' => $apiVersion]
        );
    }
}