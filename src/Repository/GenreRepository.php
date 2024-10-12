<?php

namespace App\Repository;

use App\Api\Genres;
use App\Model\Genres as GenresModel;
use App\Model\Movies as MoviesModel;

class GenreRepository extends AbstractRepository
{
    public function getApi(): Genres
    {
        return new Genres($this->client);
    }

    public function all(array $parameters = [], array $headers = []): GenresModel
    {
        return $this->getApi()->getMovieGenres($parameters, $headers);
    }

    public function getMovies($id, array $parameters = [], array $headers = []): MoviesModel
    {
        return $this->getApi()->getMovies($id, $parameters, $headers);
    }
}