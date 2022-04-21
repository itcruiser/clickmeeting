<?php

namespace App\Service\FilterManager;

use App\Exception\UnsupportedFilterException;
use App\Filter\FilterInterface;
use App\Helper\Binary\BinaryInterface;
use App\Service\FilterExecutor\FilterExecutorInterface;

class FilterManager implements FilterManagerInterface
{
    /**
     * @var FilterExecutorInterface[]
     */
    private $executors = [];

    /**
     * @param FilterExecutorInterface[] $executors
     */
    public function __construct(iterable $executors)
    {
        foreach($executors as $executor) {
            $this->addExecutor($executor);
        }
    }

    public function execute(BinaryInterface $binary, FilterInterface $filter): BinaryInterface
    {
        foreach($this->executors as $executor) {
            if(!$executor->supports($filter)) {
                continue;
            }
            return $executor->execute($binary, $filter);
        }
        throw new UnsupportedFilterException(sprintf('Cannot find executor for filter %s', get_class($filter)));
    }

    private function addExecutor(FilterExecutorInterface $executor): self
    {
        $this->executors[] = $executor;
        return $this;
    }
}