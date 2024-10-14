<?php

namespace App\Api;

use App\Model\Movie;
use App\Model\Movies as MoviesModel;
use App\Model\Videos;

class Movies extends AbstractApi
{
    public function load(int $movieId, array $parameters = [], array $headers = []): Movie
    {
        $response = $this->get('movie/' . $movieId, $parameters, $headers);

        return $this->deserialize($response, Movie::class);
    }

    public function search(array $parameters = [], array $headers = []): MoviesModel
    {
        $response = $this->get('search/movie', $parameters, $headers);

        return $this->deserialize($response, MoviesModel::class);
    }

    public function getVideos($movieId, array $parameters = [], array $headers = []): Videos
    {
        $response = $this->get('movie/' . $movieId . '/videos', $parameters, $headers);

        return $this->deserialize($response, Videos::class);
    }

    public function getTopRated(array $parameters = [], array $headers = []): MoviesModel
    {
        $response = $this->get('movie/top_rated', $parameters, $headers);

        return $this->deserialize($response, MoviesModel::class);
    }
}
