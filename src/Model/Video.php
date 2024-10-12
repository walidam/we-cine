<?php

namespace App\Model;

class Video
{
    public const URL_FORMAT = 'http://www.youtube.com/embed/%s?rel=0';

    private string $id;
    private string $iso6391;
    private string $iso31661;
    private string $key;
    private string $name;
    private string $site;
    private int $size;
    private string $type;
    private string $url;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Video
    {
        $this->id = $id;
        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): Video
    {
        $this->iso6391 = $iso6391;
        return $this;
    }

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): Video
    {
        $this->iso31661 = $iso31661;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): Video
    {
        $this->key = $key;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Video
    {
        $this->name = $name;
        return $this;
    }

    public function getSite(): string
    {
        return $this->site;
    }

    public function setSite(string $site): Video
    {
        $this->site = $site;
        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): Video
    {
        $this->size = $size;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Video
    {
        $this->type = $type;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Video
    {
        $this->url = $url;
        return $this;
    }
}
