<?php

namespace aeCorp\aec_src\aec_modules\aec_admin\aec_config;

class LoginAdminException extends \Exception
{
    public function __construct(string $message, int $code=0)
    {
        parent::__construct($message, $code);
    }
}