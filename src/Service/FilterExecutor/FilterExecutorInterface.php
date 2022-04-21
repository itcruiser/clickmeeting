<?php

namespace App\Service\FilterExecutor;

use App\Filter\FilterInterface;
use App\Helper\Binary\BinaryInterface;

interface FilterExecutorInterface
{
    public function supports(FilterInterface $filter): bool;

    public function execute(BinaryInterface $binary, FilterInterface $filter): BinaryInterface;
}