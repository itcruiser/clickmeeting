<?php

namespace App\Filter;

class SimpleFilter extends LiipImagineFilter
{
    function getFilter(): string
    {
        return 'simple_thumb';
    }
}