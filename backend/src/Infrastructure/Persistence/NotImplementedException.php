<?php

namespace App\Infrastructure\Persistence;

use Throwable;

class NotImplementedException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?? "Método não implementado.", $code, $previous);
    }
}