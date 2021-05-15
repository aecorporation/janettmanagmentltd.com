<?php

namespace aeCorp\aec_utils\aec_session;


class Session implements \ArrayAccess, SessionInterface
{
    private function ensureStarted()
    {
        if(session_status() === PHP_SESSION_NONE)
        {
            \session_start();
        }
        
    }

    public function set(string $name, $value) : SessionInterface
    {
        $this->ensureStarted();
        $_SESSION[$name] = $value;
        return $this;
    }

    public function get(string $name) 
    {
        $this->ensureStarted();
        if(array_key_exists($name, $_SESSION))
        {
            return $_SESSION[$name];
        }
      
    }

    public function exists($name) : bool
    {
        $this->ensureStarted();
        return isset($_SESSION[$name]);
    }

    public function unset($name) : SessionInterface
    {
        $this->ensureStarted();
        unset($_SESSION[$name]);
        return $this;
    }


    public function offsetGet($offset)
    {
       return $this->get($offset);
    }
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }
    public function offsetExists($offset)
    {
        return $this->exists($offset);
    }
    public function offsetUnset($offset)
    {
        $this->unset($offset);
    }













}