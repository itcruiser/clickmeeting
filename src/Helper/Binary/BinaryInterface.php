<?php

namespace App\Helper\Binary;

interface BinaryInterface
{
    public function getContent();

    public function getMimeType();

    public function getFormat();
}