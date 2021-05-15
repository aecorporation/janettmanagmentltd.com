<?php

namespace aeCorp\aec_utils\aec_datamanagers;

use aeCorp\aec_utils\aec_factory\Create;

class Hydrator
{
    public static function hydrate(array $data, $object)
    {
        $obj = Create::factory($object, [$data]);

        /*  foreach ($data as $key => $value) {
            $method = "set".ucfirst($key);

            if(method_exists($obj, $method)){
                $obj->$method($value);
            }else{
                $obj->$key = $value;
            }

            return $obj;
        }*/
        return $obj;
    }


}