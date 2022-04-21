<?php

namespace App\Filter;

class PremiumFilter extends LiipImagineFilter
{
    function getFilter(): string
    {
        return 'premium_thumb';
    }
}