<?php

namespace App\Service\DataLoader;

use App\Helper\Binary\BinaryInterface;

interface DataLoaderInterface
{
    public function find(string $path): BinaryInterface;
}