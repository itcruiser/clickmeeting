<?php

namespace App\Service;

use App\Filter\FilterInterface;

interface ThumbnailGenerator
{
    public function generate(string $path, FilterInterface $filter);
}