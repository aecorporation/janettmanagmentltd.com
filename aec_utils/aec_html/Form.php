<?php

//namespace
namespace aeCorp\aec_utils\aec_html;


class Form{

    public function __construct(array $posts = [])
    {

    }

    public function input(?string $type, ?string $name, array $params = [])
    {
        $attrs = "";

        if(!empty($params)){

            foreach($params as $key => $value){
                $attrs .= " $key = $value ";
            }

        }

        $input = '<input type="'.$type.'" name="'.$name.'" value="'.$this->posts[$name] ?? null.'" '.$attrs.' />';

        return $input;
    }

    public function radio(?string $name, array $params = [])
    {
        $attrs = "";

        if(!empty($params)){

            foreach($params as $key => $value){
                $attrs .= " $key = $value ";
            }

        }

        if($this->posts[$name] === $value){
            $choix = "CHECKED";
        }

        $input = '<input type="radio" name="'.$name.'" value="'.$this->posts[$name] ?? null.'" '.$attrs.' '.$choix.'/>';

        return $input;
    }

    public function checkbox(?string $name, array $params = [])
    {
        $attrs = "";

        if(!empty($params)){

            foreach($params as $key => $value){
                $attrs .= " $key = $value ";
            }

        }

        if($this->posts[$name] === $value){
            $choix = "CHECKED";
        }

        $input = '<input type="checkbox" name="'.$name.'" value="'.$this->posts[$name] ?? null.'" '.$attrs.' '.$choix.' />';

        return $input;
    }

    public function select(?string $name, array $options = [], array $params = [])
    {
        $attrs = "";
        $optionItems = "";

        if(!empty($params)){

            foreach($params as $key => $value){
                $attrs .= " $key = $value ";
            }
        }

        $select = '<select name="'.$name.'" '.$attrs.'>';

        foreach($options as $key => $value){

            if($this->posts[$name] === $value){
                $choix = "SELECTED";
            }
            $optionItems .= '<option value="'.$key.'" '.$choix.'>'.$value.'</option>';
        }

        return $select;
    }


}
