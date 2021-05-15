<?php

namespace aeCorp\aec_utils\aec_session;

class FlashService
{
    private $key = "Flash";
    private $session;
    private $messages;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function success(string $message) 
    {
        $flash = [];
        $flash["success"] = $message;
        $this->session->set($this->key, $flash);
    }
    public function error(string $message)
    {
        $flash = [];
        $flash["error"] = $message;
        $this->session->set($this->key, $flash);
    }

    public function get(string $type): ?string
    {
        if($this->messages === null)
        {
            $this->messages = $this->session->get($this->key)??[];
            $this->session->unset($this->key);
        }
        if(array_key_exists($type, $this->messages))
        {
            return $this->messages[$type];
        }
        return null;
    
    }
}