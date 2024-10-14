<?php

namespace App\Repository;

use App\Api\ApiInterface;

abstract class AbstractRepository
{
    protected ApiInterface $api;

    abstract public function getApi(): ApiInterface;
}