<?php

namespace aeCorp\aec_utils\aec_session;

interface SessionInterface 
{

    public function set(string $name, $value) : SessionInterface;

    public function get(string $name);

    public function exists($name) : bool;

    public function unset($name) : SessionInterface ;
}