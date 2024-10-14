<?php

namespace App\Tests\Repository;

use App\Api\ApiInterface;
use App\Api\Genres;
use App\Model\Genres as GenresModel;
use App\Model\Movies as MoviesModel;
use App\Repository\GenreRepository;
use PHPUnit\Framework\TestCase;
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
        $expected = $this->createMock(GenresModel::class);

        $this->api->expects(self::once())
            ->method('getMovieGenres')
            ->willReturn($expected)
        ;

        $actual = $this->repository->all();
        $this->assertEquals($actual->getGenres(), $expected->getGenres());
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