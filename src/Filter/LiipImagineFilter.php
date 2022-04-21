<?php

namespace App\Filter;

abstract class LiipImagineFilter extends AbstractFilter
{
    abstract function getFilter(): string;

    public function getRuntimeConfig(): array
    {
        return [];
    }
}