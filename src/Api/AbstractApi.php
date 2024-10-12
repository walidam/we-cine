<?php

namespace App\Api;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractApi implements ApiInterface
{
    protected HttpClientInterface $client;

    protected SerializerInterface $serializer;

    public function __construct(HttpClientInterface $movieDbClient)
    {
        $this->client = $movieDbClient;
        $encoders = [new JsonEncoder()];
        $normalizers = [
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
            new ArrayDenormalizer(),
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function get(string $path, array $parameters = [], array $headers = []): ResponseInterface
    {
        return $this->client->request('GET', $path, [
            'query' => $parameters,
            'headers' => $headers,
        ]);
    }

    protected function deserialize(ResponseInterface $response, ?string $className = null)
    {
        return $this->serializer->deserialize($response->getContent(), $className, 'json');
    }
}