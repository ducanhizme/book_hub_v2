<?php

namespace App\Exceptions;

use App\Helper\ApiResponse;
use Exception;

class BookException extends Exception
{
    protected $message;
    protected $code;

    public function __construct(string $message="Something went wrong",int $code = 500)
    {
        $this->message = $message;
        $this->code = $code;
        parent::__construct($this->message, $this->code);
    }
}
