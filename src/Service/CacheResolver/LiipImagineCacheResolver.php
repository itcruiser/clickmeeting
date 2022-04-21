<?php

namespace App\Service\CacheResolver;

use App\Filter\FilterInterface;
use App\Helper\Binary\BinaryInterface;
use Liip\ImagineBundle\Imagine\Cache\Resolver\ResolverInterface;
use Liip\ImagineBundle\Model\Binary;

class LiipImagineCacheResolver implements CacheResolverInterface
{
    private $cacheResolver;

    public function __construct(ResolverInterface $cacheResolver)
    {
        $this->cacheResolver = $cacheResolver;
    }

    public function store(BinaryInterface $binary, FilterInterface $filter, string $path): string
    {
        $filterName = md5($filter->getName());
        $this->cacheResolver->store(
            new Binary($binary->getContent(), $binary->getMimeType(), $binary->getFormat()),
            $path,
            $filterName
        );
        return $this->cacheResolver->resolve($path, $filterName);
    }
}