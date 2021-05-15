<?php

namespace aeCorp\aec_utils\aec_message;

class Message 
{
   
    private ?\stdClass $list =null;

    private ?array $langList= ["fr", "en"];

    private ?string $lang= "fr";

    /**
     * La langue francaise par defaut
     */

    public function __construct(?string $lang=null)
    {
        $messageLists = file_get_contents(dirname(dirname(__DIR__))."/aec_src/aec_specs/messages.json");

        if(in_array($lang, $this->langList)){
            $this->lang = $lang;
        }else{
            $this->lang ="fr";
        }
        $this->list = json_decode($messageLists)->{$this->lang};
        
    }



    public function __invoke()
    {
        return $this->list;
    }


}