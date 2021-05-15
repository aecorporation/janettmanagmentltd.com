<?php

namespace aeCorp\aec_core;

abstract class MailAbstract {

    private ?string $from = null;
    private ?string $fromName = null;
    private ?array $to = null;
    private ?array $cc = null;
    private ?array $bcc = null;
    private ?string $file = null;
    private ?array $replyTo = null;
    private ?string $subject = null;
    private ?string $message = null;
    private ?string $headers = null;
    
    public function from(string $from) : self {

        $this->from = $from;

        return $this;

    }

    public function fromName(string $fromName) : self {

        $this->fromName = $fromName;

        return $this;

    }

    public function to(string $to) : self {

        $this->to[] = $to;

        return $this;

    }
    public function replyTo(string $replyTo) : self {

        $this->replyTo[] = $replyTo;

        return $this;

    }

    public function cc(string $cc) : self {

        $this->cc[] = $cc;

        return $this;

    }

    public function bcc(string $bcc) : self {

        $this->bcc[] = $bcc;

        return $this;

    }

    public function file(string $file) : self {

        $this->file = $file;

        return $this;

    }

    public function subject(string $subject) : self {

        $this->subject = $subject;

        return $this;

    }

    public function message(string $message) : self {

        $this->message = $message;

        return $this;

    }

    public function headers(){

        if(!empty($this->from)){
            $this->headers .="From: ".$this->fromName." <".$this->from." >"."\r\n";
        }
        if(!empty($this->replyTo)){
            $this->headers .= "Reply-To: ". $this->replyTo."\r\n";
        }
        if(!empty($this->cc)){
            $this->headers .= "Cc: ".join(",", $this->cc)."\r\n";
        }
        if(!empty($this->bcc)){
            $this->headers .="Bcc: ".join(",", $this->bcc)."\r\n";
        }
        if(!empty($this->file)){

            $fileName   = basename($this->file);
            $fileSize   = filesize($this->file);
            $handle     = fopen($this->file, "r");
            $content    = fread($handle, $fileSize);
            fclose($handle);
            $content = chunk_split(base64_encode($content));

            $this->headers .="Content-Type: application/octet-stream; name=".$fileName."\r\n";
            $this->headers .="Content-Transfer-Encoding: base64"."\r\n";
            $this->headers .="Content-Disposition: attachment; filename=".$fileName."\r\n";
            $this->headers .= $content."\r\n"."\r\n";
        }

    }

    public function sendText(){

        $this->headers();
        if(empty($this->file)){
            $this->headers .="Content-type: text/plain; charset=iso-8859-1";
        }
        return mail(join(",", $this->to), $this->subject, $this->message, $this->headers);
    }

    public function sendHTML(){

        $this->headers();
        $this->headers .="MIME-Version: 1.0"."\r\n";
        if(empty($this->file)){
            $this->headers .="Content-type: text/html; charset=iso-8859-1"."\r\n";
        }
        return mail(join(",", $this->to), $this->subject, $this->message, $this->headers);

    }


}