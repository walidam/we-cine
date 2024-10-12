<?php

namespace App\Model;

class Movies
{
    private int $id;

    private int $page = 1;
    /**
     * @var Movie[]
     */
    private array $results = [];
    private int $totalPages = 1;
    private int $totalResults = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Movies
    {
        $this->id = $id;
        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): Movies
    {
        $this->page = $page;
        return $this;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages(int $totalPages): Movies
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    public function getTotalResults(): int
    {
        return $this->totalResults;
    }

    public function setTotalResults(int $totalResults): Movies
    {
        $this->totalResults = $totalResults;
        return $this;
    }

    /**
     * @return Movie[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    public function addResult(Movie $movie): Movies
    {
        $this->results[] = $movie;

        return $this;
    }

    public function removeResult(Movie $movie): void
    {
    }
}
