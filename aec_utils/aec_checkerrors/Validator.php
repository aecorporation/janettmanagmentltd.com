<?php

namespace aeCorp\aec_utils\aec_checkerrors;

use aeCorp\aec_utils\aec_factory\Create;
use \DateTime;

class Validator
{
    
    private array $params = [];
    
    private array $errors = [];

    private string $index = "";

    public function __construct(array $params)
    {
        $this->params = $params;       
    }

    public function required(string ...$keys) : self
    {
        foreach ($keys as $key) {

            $ks = explode("=>", $key);

            if (is_array($ks) && count($ks) > 1) {
                $key = $ks[0];
                $keymessage = $ks[1];
            } else {
                $keymessage = $ks[0];
            }

            $this->index = $ks[0];

            $value = $this->getValue($key);

            if(is_null($value))
            {
                $this->addError($keymessage, "required");
            }
        }
        return $this;

    }

    public function noEmpty(string ...$keys): self
    {
        foreach ($keys as $key) {

            $ks = explode("=>", $key);

            if (is_array($ks) && count($ks)>1) {
                $key = $ks[0];
                $keymessage = $ks[1];
            } else {
                $keymessage = $ks[0];
            }

            $this->index = $ks[0];

            $value = $this->getValue($key);

            if (is_null($this->getValue($key)) || $this->getValue($key)== "" || empty($this->getValue($key))) {
                $this->addError($keymessage, "empty");
            }
        }

        return $this;
    }

    public function length($key, ?int $min, ?int $max=null) : self
    {
        $ks = explode("=>", $key);

        if (is_array($ks) && count($ks) > 1) {
            $key = $ks[0];
            $keymessage = $ks[1];
        } else {
            $keymessage = $ks[0];
        }

        $this->index = $ks[0];

        $value = $this->getValue($key);
        $lenght = mb_strlen($value);

        if(!is_null($min) && !is_null($max) && ($lenght<$min || $lenght> $max) )
        {
            $this->addError($keymessage, "betweenLength", [$min, $max]);

        }else if (!is_null($min) && $lenght < $min ) {

            $this->addError($keymessage, "minLenght", [$min]);

        }else if (!is_null($min) && $lenght > $max) {

            $this->addError($keymessage, "maxLenght", [$max]);

        }
        return $this;
    }

    public  function isDate(string $key, string $format = "Y-m-d") : self
    {
        $this->dateOperation($key, $format);

        return $this;
    }
    public  function isDateTime(string $key, string $format = "Y-m-d H:i:s") : self
    {
        $this->dateOperation($key, $format);

        return $this;
    }
    private  function dateOperation(string $key, string $format): void
    {
        $ks = explode("=>", $key);

        if (is_array($ks) && count($ks) > 1) {
            $key = $ks[0];
            $keymessage = $ks[1];
        } else {
            $keymessage = $ks[0];
        }

        $this->index = $ks[0];
        
        $value = $this->getValue($key);

        $date = \DateTime::createFromFormat($format, $value);

        $errors = \DateTime::getLastErrors();

        if($errors["error_count"]>0 && $errors["warning_count"]>0 || $date===false)
        {
            $this->addError($keymessage, "dateTime", [$format]);
        }
        
    }

    public function isMail(string $key) : self
    {
        $ks = explode("=>", $key);

        if (is_array($ks) && count($ks) > 1) {
            $key = $ks[0];
            $keymessage = $ks[1];
        } else {
            $keymessage = $ks[0];
        }

        $this->index = $ks[0];

        $pattern = "/^([_a-z0-9\-]*)@([_a-z0-9\-]*)\.([_a-z\-]){2,3}$/";
        $value = $this->getValue($key);

        if(!\preg_match($pattern, $value))
        {
            $this->addError($keymessage, "email");
        }
        return $this;
    }

    public function phone(string $key): self
    {
        return $this;
    }
    public function equalFields(string $key1, string $key2)
    {
        $ks1 = explode("=>", $key1);
        $ks2 = explode("=>", $key2);

        if (is_array($ks1) && count($ks1) > 1) {
            $key1 = $ks1[0];
            $keymessage1 = $ks1[1];
        } else {
            $keymessage1 = $ks1[0];
        }
        if (is_array($ks2) && count($ks2) > 1) {
            $key2 = $ks2[0];
            $keymessage2 = $ks2[1];
        } else {
            $keymessage2 = $ks2[0];
        }

        $value1 = $this->getValue($key1);
        $value2 = $this->getValue($key2);

        if($value1!==$value2){
            $this->addError($keymessage1, "noEqualFields", [$keymessage2]);
        }

        return $this;
    }

    public function equalTo(string $key1,string $key2)
    {
        $ks1 = explode("=>", $key1);
        $ks2 = explode("=>", $key2);

        if (is_array($ks1) && count($ks1) > 1) {
            $key1 = $ks1[0];
            $keymessage1 = $ks1[1];
        } else {
            $keymessage1 = $ks1[0];
        }
        if (is_array($ks2) && count($ks2) > 1) {
            $key2 = $ks2[0];
            $keymessage2 = $ks2[1];
        } else {
            $keymessage2 = $ks2[0];
        }
        $value1 = $this->getValue($key1);
        $value2 = $key2;

        if ($value1 !== $value2) {
            $this->addError($keymessage1, "noEqualTo", [$keymessage2]);
        }

        return $this;
    }

    public function urlNotExists(string ...$keys): self
    {
        foreach ($keys as $key) {

            $ks = explode("=>", $key);

            if (is_array($ks) && count($ks) > 1) {
                $key = $ks[0];
                $keymessage = $ks[1];
            } else {
                $keymessage = $ks[0];
            }

            $this->index = $ks[0];

            $value = $this->getValue($key);

            $result = @fopen($value, "r");
            if (!$result) {
                $this->addError($keymessage, "urlNotExists");
            }
        }

        return $this;
    }

    public function isNotUrl(string ...$keys): self
    {
        foreach ($keys as $key) {

            $ks = explode("=>", $key);

            if (is_array($ks) && count($ks) > 1) {
                $key = $ks[0];
                $keymessage = $ks[1];
            } else {
                $keymessage = $ks[0];
            }

            $this->index = $ks[0];
            
            $value = $this->getValue($key);

            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                $this->addError($keymessage, "isNotUrl");
            }

        }

        return $this;
    }




    public function getErrors(): array
    {
        return $this->errors;
    }

    public function isValid(): bool
    {
        return empty($this->errors);
    }


    private function addError(string $key, string $rule, array $attributes = [])
    {
       // $this->errors[$key] = (string) Create::factory(Error::class, [$key, $rule, $attributes]);
        $this->errors[$this->index] = (string) Create::factory(Error::class, [$key, $rule, $attributes]);
    }

    private function getValue($key)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        }
        return null;
    }


}