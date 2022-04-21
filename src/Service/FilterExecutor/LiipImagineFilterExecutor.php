<?php

namespace App\Service\FilterExecutor;

use App\Exception\UnsupportedFilterException;
use App\Filter\FilterInterface;
use App\Filter\LiipImagineFilter;
use App\Helper\Binary\BinaryInterface;
use App\Helper\Binary\LiipImagineBinary;
use Liip\ImagineBundle\Imagine\Filter\FilterManager;
use Liip\ImagineBundle\Model\Binary;

class LiipImagineFilterExecutor implements FilterExecutorInterface
{
    private $filterManager;

    public function __construct(FilterManager $filterManager)
    {
        $this->filterManager = $filterManager;
    }

    public function supports(FilterInterface $filter): bool
    {
        return $filter instanceof LiipImagineFilter;
    }

    public function execute(BinaryInterface $binary, FilterInterface $filter): BinaryInterface
    {
        if (!$filter instanceof LiipImagineFilter) {
            throw new UnsupportedFilterException(sprintf('Unsupported filter class %s. Instance of %s expected.', get_class($filter), LiipImagineFilter::class));
        }

        return new LiipImagineBinary(
            $this->filterManager->applyFilter(
                new Binary($binary->getContent(), $binary->getMimeType(), $binary->getFormat()),
                $filter->getFilter(),
                $filter->getRuntimeConfig()
            )
        );
    }
}