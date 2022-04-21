<?php

namespace App\Service\FilterManager;

use App\Filter\FilterInterface;
use App\Helper\Binary\BinaryInterface;

interface FilterManagerInterface
{
    public function execute(BinaryInterface $binary, FilterInterface $filter): BinaryInterface;
}