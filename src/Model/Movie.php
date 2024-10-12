<?php

namespace App\Model;

use DateTime;

class Movie
{
    private int $id;
    private bool $adult = false;
    private ?string $backdropPath;
    private int $budget;
    private Genres $genres;
    private string $homepage;
    private string $imdbId;
    private string $originalTitle;
    private string $originalLanguage;
    private string $overview;
    private float $popularity;
    private ?string $posterPath;
    private ?DateTime $releaseDate;
    private int $revenue;
    private int $runtime;
    private string $status;
    private string $tagline;
    private string $title;
    private float $voteAverage;
    private int $voteCount;

    public function __construct()
    {
        $this->genres = new Genres();
    }

    public function getAdult(): bool
    {
        return $this->adult;
    }

    public function setAdult(bool $adult): Movie
    {
        $this->adult = $adult;

        return $this;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): Movie
    {
        $this->backdropPath = $backdropPath;
        return $this;
    }

    public function getGenres(): Genres
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): Movie
    {
        $this->genres->addGenre($genre);

        return $this;
    }
    public function removeGenre(Genre $genre): void
    {
        $this->genres->removeGenre($genre);
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): Movie
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Movie
    {
        $this->id = $id;

        return $this;
    }

    public function getImdbId(): string
    {
        return $this->imdbId;
    }

    public function setImdbId(string $imdbId): Movie
    {
        $this->imdbId = $imdbId;

        return $this;
    }

    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(string $originalTitle): Movie
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): Movie
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): Movie
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPopularity(): float
    {
        return $this->popularity;
    }

    public function setPopularity(float  $popularity): Movie
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): Movie
    {
        $this->posterPath = $posterPath;
        return $this;
    }

    public function getReleaseDate(): ?DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime|string|null $releaseDate
     */
    public function setReleaseDate($releaseDate = null): Movie
    {
        if (empty($releaseDate)) {
            $releaseDate = null;
        } elseif (!$releaseDate instanceof DateTime) {
            $releaseDate = new DateTime($releaseDate);
        }

        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getRevenue(): int
    {
        return $this->revenue;
    }

    public function setRevenue(int $revenue): Movie
    {
        $this->revenue = (int)$revenue;

        return $this;
    }

    public function getRuntime(): int
    {
        return $this->runtime;
    }

    public function setRuntime(int $runtime): Movie
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getBudget(): int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): Movie
    {
        $this->budget = $budget;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Movie
    {
        $this->status = $status;
        return $this;
    }

    public function getTagline(): string
    {
        return $this->tagline;
    }

    public function setTagline(string $tagline): Movie
    {
        $this->tagline = $tagline;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    public function setVoteAverage(float $voteAverage): Movie
    {
        $this->voteAverage = $voteAverage;
        return $this;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): Movie
    {
        $this->voteCount = $voteCount;
        return $this;
    }
}
