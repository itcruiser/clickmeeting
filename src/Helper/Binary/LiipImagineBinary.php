<?php

namespace App\Helper\Binary;

use Liip\ImagineBundle\Binary\BinaryInterface as BaseBinaryInterface;

class LiipImagineBinary implements BinaryInterface, BaseBinaryInterface
{
    private $binary;

    public function __construct(BaseBinaryInterface $binary)
    {
        $this->binary = $binary;
    }

    public function getContent(): string
    {
        return $this->binary->getContent();
    }

    public function getMimeType(): string
    {
        return $this->binary->getMimeType();
    }

    public function getFormat(): string
    {
        return $this->binary->getFormat();
    }
}