<?php

namespace aeCorp\aec_utils\aec_checkerrors;

class LengthDataException extends \Exception
{
    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
