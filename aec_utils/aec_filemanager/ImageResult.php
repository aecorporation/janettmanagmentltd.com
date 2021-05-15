<?php

namespace aeCorp\aec_utils\aec_filemanager;

use aeCorp\aec_utils\aec_factory\Create;

class ImageResult  implements \ArrayAccess, \Iterator
{
    private $results = [];
    private $index = 0;
    private $hydratedresults = [];
    private $entity;

    public function __construct(array $results)
    {
        $this->results = $results;
    }

    public function get(int $index)
    {
            if (!isset($this->hydratedresults[$index])) {
                $this->hydratedresults[$index] =  Create::instance(Image::class,$this->results[$index]);
            }
            return $this->hydratedresults[$index];
    }

    public function current()
    {
        return $this->get($this->index);
    }
    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->records[$this->index]);
    }
    public function rewind()
    {
        $this->index = 0;
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return false;
    }

    public function offsetExists($offset)
    {
        return isset($this->get($offset));
    }

    public function offsetUnset($offset)
    {
        return false;
    }
}
