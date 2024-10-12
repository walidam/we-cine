<?php

namespace App\Model;

class Videos
{
    private int $id;
    /**
     * @var Video[]
     */
    private array $results = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Videos
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Video[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    public function addResult(Video $video): Videos
    {
        if (strtolower($video->getSite()) === 'youtube') {
            $video->setUrl(sprintf(Video::URL_FORMAT, $video->getKey()));
        }
        $this->results[] = $video;

        return $this;
    }
    public function removeResult(Video $video): void
    {
    }
}
