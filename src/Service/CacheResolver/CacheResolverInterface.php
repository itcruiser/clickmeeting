<?php

namespace App\Service\CacheResolver;

use App\Filter\FilterInterface;
use App\Helper\Binary\BinaryInterface;

interface CacheResolverInterface
{
    public function store(BinaryInterface $binary, FilterInterface  $filter, string $path): string;
}