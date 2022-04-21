<?php

namespace App\Filter;

use App\Helper\Binary\BinaryInterface;
use App\Service\FilterManager\FilterManagerInterface;

class CompositeFilter extends AbstractFilter
{
    /**
     * @var FilterInterface[]
     */
    private $filters;

    public function addFilter(FilterInterface $filter): self
    {
        $this->filters[] = $filter;
        return $this;
    }

    public function execute(BinaryInterface $binary, FilterManagerInterface $filterManager): BinaryInterface
    {
        $_binary = $binary;
        foreach ($this->filters as $filter) {
            $_binary = $filter->execute($_binary, $filterManager);
        }
        return $_binary;
    }

    public function getName(): string
    {
        return implode('|', array_map(function($filter){ return $filter->getName(); }, $this->filters));
    }
}