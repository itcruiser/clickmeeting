<?php

namespace App\Exception;

use Throwable;
use InvalidArgumentException;

class FileNotExistException extends InvalidArgumentException
{
    public function __construct($message = "File does not exist.", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}