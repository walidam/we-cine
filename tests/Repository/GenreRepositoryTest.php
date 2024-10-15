<?php

namespace App\Tests\Repository;

use App\Api\ApiInterface;
use App\Api\Genres;
use App\Model\Genres as GenresModel;
use App\Model\Movies as MoviesModel;
use App\Repository\GenreRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GenreRepositoryTest extends TestCase
{
    private GenreRepository $repository;
    private ApiInterface $api;

    public function setUp(): void
    {
        $this->api = $this->createMock(Genres::class);
        $this->repository = new GenreRepository($this->api);
        $this->response = $this->createMock(ResponseInterface::class);
    }

    public function test_all_genres(): void
    {
        $data = file_get_contents('tests/Mocks/genres.json');
        $encoders = [new JsonEncoder()];
        $normalizers = [
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
            new ArrayDenormalizer(),
        ];

        $serializer = new Serializer($normalizers, $encoders);
        $genres = $serializer->deserialize($data, GenresModel::class, 'json');

        $this->api->expects(self::once())
            ->method('getMovieGenres')
            ->willReturn($genres)
        ;

        $genresResponse = $this->repository->all();

        $this->assertEquals($genresResponse, $genres);
    }

    public function test_get_movies(): void
    {
        $expected = $this->createMock(MoviesModel::class);

        $this->api->expects(self::once())
            ->method('getMovies')
            ->with('id')
            ->willReturn($expected)
        ;

        $actual = $this->repository->getMovies('id');
        $this->assertEquals($actual, $expected);
    }
}