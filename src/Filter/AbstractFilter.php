<?php

namespace App\Filter;

use App\Helper\Binary\BinaryInterface;
use App\Service\FilterManager\FilterManagerInterface;

abstract class AbstractFilter implements FilterInterface
{
    public function getName(): string
    {
        return get_class($this);
    }

    public function execute(BinaryInterface $binary, FilterManagerInterface $filterManager): BinaryInterface
    {
        return $filterManager->execute($binary, $this);
    }
}