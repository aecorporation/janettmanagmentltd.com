<?php

namespace aeCorp\aec_utils\aec_middlewares;

class PrivilegeException extends \Exception
{
    public function __construct(string $message, int $code=0)
    {
        parent::__construct($message, $code);
    }
}