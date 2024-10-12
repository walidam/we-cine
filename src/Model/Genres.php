<?php

namespace App\Model;

class Genres
{
    protected array $genres = [];

    /**
     * @return Genre[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    public function getGenre($id): ?Genre
    {
        foreach ($this->genres as $genre) {
            if ($id === $genre->getId()) {
                return $genre;
            }
        }

        return null;
    }

    public function addGenre(Genre $genre): self
    {
        $this->genres[] = $genre;

        return $this;
    }
    public function removeGenre(Genre $genre): void
    {
    }
}
