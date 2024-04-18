<?php

use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Http\Mock\Client;

require 'vendor/autoload.php';

$client = Elastic\Elasticsearch\ClientBuilder::create()->build();

$client = ClientBuilder::create()
   ->setElasticCloudId('The_Computer_Shop:dXMtY2VudHJhbDEuZ2NwLmNsb3VkLmVzLmlvJDM5MWU3YzhhNWY5MDRjMTVhNzRhZTUwOTc0YTg1ZDU4JDRmMWQ2M2M1ZDI2MjQzNWQ4ZjMyMTc4MWFhYjkwODcw')
   ->setApiKey('MEY0YzJJNEJtOVlpZlJUX2FOUE86czZlUldOSVhSRHF6LURvd0VnWTFuUQ==')
   ->build();

$response = $client->info();

echo $response->getStatusCode(); // 200
echo (string) $response->getBody(); // Response body in JSON