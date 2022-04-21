<?php

namespace App\Service;

use App\Filter\FilterInterface;
use App\Helper\Binary\BinaryInterface;
use App\Service\CacheResolver\CacheResolverInterface;
use App\Service\DataLoader\DataLoaderInterface;
use App\Service\FilterManager\FilterManagerInterface;

class ThumbnailGeneratorImpl implements ThumbnailGenerator
{
    private $filterManager;
    private $dataLoader;
    private $cacheResolver;

    public function __construct( FilterManagerInterface $filterManager, DataLoaderInterface $dataLoader, CacheResolverInterface $cacheResolver)
    {
        $this->dataLoader = $dataLoader;
        $this->filterManager = $filterManager;
        $this->cacheResolver = $cacheResolver;
    }

    public function generate(string $path, FilterInterface $filter): string
    {
        return $this->store(
            $filter->execute(
                $this->find($path),
                $this->filterManager
            ),
            $filter,
            $path
        );
    }

    private function find(string $path): BinaryInterface
    {
        return $this->dataLoader->find($path);
    }

    private function store(BinaryInterface $binary, FilterInterface  $filter, string $path): string
    {
        return $this->cacheResolver->store($binary, $filter, $path);
    }
}