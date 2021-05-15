<?php

namespace aeCorp\aec_src\aec_modules\aec_errors;

use Exception;

class OperationFailException extends Exception {

    public function __construct(string $message, int $code=0)
    {
        parent::__construct($message, $code);
    }

}