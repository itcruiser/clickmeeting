<?php

namespace App\Service\DataLoader;

use App\Helper\Binary\BinaryInterface;
use App\Helper\Binary\LiipImagineBinary;
use Liip\ImagineBundle\Binary\Loader\LoaderInterface;

class LiipImagineDataLoader implements DataLoaderInterface
{
    private $dataLoader;

    public function __construct(LoaderInterface $dataLoader)
    {
        $this->dataLoader = $dataLoader;
    }

    public function find(string $path): BinaryInterface
    {
        return new LiipImagineBinary($this->dataLoader->find($path));
    }
}