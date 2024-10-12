<?php

namespace App\Repository;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Api\ApiInterface;

abstract class AbstractRepository
{
    protected HttpClientInterface $client;
    protected ApiInterface $api;

    public function __construct(HttpClientInterface $movieDbClient)
    {
        $this->client = $movieDbClient;
    }

    public function getClient(): HttpClientInterface
    {
        return $this->client;
    }

    abstract public function getApi(): ApiInterface;
}