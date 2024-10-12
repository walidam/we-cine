<?php

namespace App\Repository;

use App\Api\Movies;
use App\Model\Movies as MoviesModel;
use App\Model\Movie as MovieModel;
use App\Model\Videos;

class MovieRepository extends AbstractRepository
{
    public function getApi(): Movies
    {
        return new Movies($this->client);
    }

    public function load($id, array $parameters = [], array $headers = []): MovieModel
    {
        return $this->getApi()->load($id, $parameters, $headers);
    }

    public function getVideos($id, array $parameters = [], array $headers = []): Videos
    {
        return $this->getApi()->getVideos($id, $parameters, $headers);
    }

    public function searchMovies(array $parameters = [], array $headers = []): MoviesModel
    {
        return $this->getApi()->search($parameters, $headers);

    }

    public function getTopRated(array $parameters = [], array $headers = []): MoviesModel
    {
        return $this->getApi()->getTopRated($parameters, $headers);
    }

    public function getMostRated(array $parameters = [], array $headers = []): MovieModel
    {
        $topRatedMovies = $this->getTopRated($parameters, $headers)->getResults();

        return reset($topRatedMovies);
    }
}
