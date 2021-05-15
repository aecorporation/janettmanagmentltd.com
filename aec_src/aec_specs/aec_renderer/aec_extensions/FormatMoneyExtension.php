<?php

namespace aeCorp\aec_src\aec_specs\aec_renderer\aec_extensions;

class FormatMoneyExtension
{

    public function render(?float $number = 0, ?int $int = 0)
    {
       return number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $number)),  $int);
    }

}
