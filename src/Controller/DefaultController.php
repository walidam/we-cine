<?php

namespace App\Controller;

use App\Repository\GenreRepositoryInterface;
use App\Repository\MovieRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     * @Template("index.html.twig")
     */
    public function index(GenreRepositoryInterface $genreRepository, MovieRepositoryInterface $movieRepository)
    {
        $genres = $genreRepository->all();
        $mostRatedMovie = $movieRepository->getMostRated();
        $videos= $movieRepository->getVideos($mostRatedMovie->getId())->getResults();

        return [
            'genres' => $genres->getGenres(),
            'bestMovie' => $mostRatedMovie,
                'bestVideo' => $videos ? reset($videos) : null,
        ];
    }

    /**
     * @Route("ajax/genre/{id}/movies", name="movies_by_genre", options = { "expose" = true })
     * @Template("movie.html.twig")
     */
    public function movies(Request $request, GenreRepositoryInterface $genreRepository, $id)
    {
        $movies = $genreRepository->getMovies($id, ['page' => $request->query->getInt('page', 1)]);

        return [
            'movies' => $movies,
        ];
    }

    /**
     * @Route("ajax/movie/{id}", name="get_movie", options={ "expose" = true })
     * @Template("video.html.twig")
     */
    public function movie(MovieRepositoryInterface $movieRepository, $id)
    {
        $movie = $movieRepository->load($id);
        $videos = $movieRepository->getVideos($movie->getId())->getResults();

        return [
            'movie' => $movie,
            'video' => $videos ? reset($videos) : null,
        ];
    }

    /**
     * @Route("ajax/movies/search", name="search_movie", options={ "expose" = true })
     * @Template("movie.html.twig")
     */
    public function search(Request $request, MovieRepositoryInterface $movieRepository)
    {
        $movies = $movieRepository->searchMovies([
            'page' => $request->query->getInt('page', 1),
            'query' => $request->query->get('query')
        ]);

        return [
            'movies' => $movies,
        ];
    }
}