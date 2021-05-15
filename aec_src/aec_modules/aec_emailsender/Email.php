<?php 

namespace aeCorp\aec_src\aec_modules\aec_emailsender;

use aeCorp\aec_core\MailAbstract;


class Email extends MailAbstract {


    public function __construct(){

    $this->from("http://www.janettmanagmentltd.com");
    $this->fromName("JANETT MANAGEMENT LTD");
    $this->to("abrahamelvis225@gmail.com");
    $this->cc("abrahamelvis225@gmail.com");
    $this->subject("NOUVEAU MESSAGE");
    
    }

}