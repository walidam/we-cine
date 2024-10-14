<?php

namespace App\Api;

use App\Model\Genres as GenresModel;
use App\Model\Movies as MoviesModel;

class Genres extends AbstractApi
{
    public function getMovieGenres(array $parameters = [], array $headers = []): GenresModel
    {
        $response = $this->get('genre/movie/list', $parameters, $headers);

        return $this->deserialize($response, GenresModel::class);
    }

    public function getMovies($genreId, array $parameters = [], array $headers = []): MoviesModel
    {
        $response = $this->get('genre/' . $genreId . '/movies', $parameters, $headers);

        return $this->deserialize($response, MoviesModel::class);
    }
}