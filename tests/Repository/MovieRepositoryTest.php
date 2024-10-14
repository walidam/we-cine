<?php

namespace App\Tests\Repository;

use App\Api\ApiInterface;
use App\Api\Movies;
use App\Model\Movie as MovieModel;
use App\Model\Movies as MoviesModel;
use App\Model\Videos;
use App\Repository\MovieRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MovieRepositoryTest extends TestCase
{
    private MovieRepository $repository;
    private ApiInterface $api;

    public function setUp(): void
    {
        $this->api = $this->createMock(Movies::class);
        $this->repository = new MovieRepository($this->api);
        $this->response = $this->createMock(ResponseInterface::class);
    }

    public function test_load(): void
    {
        $expected = $this->createMock(MovieModel::class);

        $this->api->expects(self::once())
            ->method('load')
            ->with(123)
            ->willReturn($expected)
        ;

        $actual = $this->repository->load(123);
        $this->assertEquals($actual, $expected);
    }

    public function test_get_videos(): void
    {
        $expected = $this->createMock(Videos::class);

        $this->api->expects(self::once())
            ->method('getVideos')
            ->with(123)
            ->willReturn($expected)
        ;

        $actual = $this->repository->getVideos(123);
        $this->assertEquals($actual, $expected);
    }

    public function test_search_movies(): void
    {
        $expected = $this->createMock(MoviesModel::class);

        $this->api->expects(self::once())
            ->method('search')
            ->willReturn($expected)
        ;

        $actual = $this->repository->searchMovies();
        $this->assertEquals($actual, $expected);
    }
}