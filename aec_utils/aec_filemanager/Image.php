<?php


namespace aeCorp\aec_utils\aec_filemanager;


class Image implements \JsonSerializable
{

    private $index;
    private $name;
    private $tmp;
    private $size;
    private $info;
    private $extension;
    private $type;
    private $content;
    private $folder;


    protected $listJson = [];
    protected $vars = [];


    public function __construct(array $attributes=[])
    {
        $this->vars = $attributes;

        foreach ($this->vars as $key => $value) {
            $method="set".ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
        
    }

    /**
     * Get the value of index
     */ 
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set the value of index
     *
     * @return  self
     */ 
    public function setIndex($index)
    {
        $this->index = $index;

        return $this;
    }

      /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of tmp
     */ 
    public function getTmp()
    {
        return $this->tmp;
    }

    /**
     * Set the value of tmp
     *
     * @return  self
     */ 
    public function setTmp($tmp)
    {
        $this->tmp = $tmp;

        return $this;
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of info
     */ 
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info
     *
     * @return  self
     */ 
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get the value of extension
     */ 
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set the value of extension
     *
     * @return  self
     */ 
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }



    /**
     * jsonserialize function implementée depuis l'interface  Jsonserializable.
     * @access	public
     * @return	array
     */
    public function jsonserialize(): array
    {

        foreach ($this->vars as $key => $value) {
            $getMethod = "get" . ucfirst($key);

            if (\is_callable(array($this, $getMethod)) && $getMethod !=="getContent") {
                $this->listJson[$key] = $this->$getMethod();
            }
        }

        return $this->listJson;
    }

    public function arrayData(): array
    {
        return $this->jsonserialize();
    }




    /**
     * Get the value of folder
     */ 
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set the value of folder
     *
     * @return  self
     */ 
    public function setFolder($folder)
    {
        $this->folder = $folder;
        
        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}