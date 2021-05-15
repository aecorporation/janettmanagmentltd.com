<?php

namespace aeCorp\aec_utils\aec_renderer;

use aeCorp\aec_utils\aec_checkerrors\FileNotFoundException;


class Renderer implements RendererInterface
{
    private ?string $folder=null;
    private ?string $layout = null;
    private array $globals = [];
    private array $extensions = [];
    private ?string $viewPath= null;
    private ?string $prefix=null;
    private ?string $ext=null;
    private ?string $partielLayoutPath = null;

    public function __construct(string $folder=null)
    {
        $this->folder = $folder;
        $this->prefix = "aec_";
        $this->ext = ".php";
    }

    public function setFolder(string $folder) : RendererInterface
    {
        
        $folder = $this->replacePointbySlash($this->removesliashstartingofurl($folder));

        $paths = explode(DIRECTORY_SEPARATOR, $folder);

        $paths = array_map(function($item){

            if(strpos($item, $this->prefix)!==0){
                $item = $this->prefix.$item; 
            }
            return $item;

        }, $paths);

        $folder = DIRECTORY_SEPARATOR.join(DIRECTORY_SEPARATOR, $paths);
        $this->folder = $folder;
        return $this;
    }

    public function setLayout(string $name) : RendererInterface
    {
        $name = $this->replacePointbySlash($this->removesliashstartingofurl(DIRECTORY_SEPARATOR."aec_src" . 
        DIRECTORY_SEPARATOR."aec_modules".
        DIRECTORY_SEPARATOR . $name));

        $paths = explode(DIRECTORY_SEPARATOR, $name);

        $paths = array_map(function($item){

            if(strpos($item, $this->prefix)!==0){
                $item = $this->prefix.$item; 
            }
            return $item;

        }, $paths);


        $name = DIRECTORY_SEPARATOR.join(DIRECTORY_SEPARATOR, $paths);

        $this->partielLayoutPath = DIRECTORY_SEPARATOR.join(DIRECTORY_SEPARATOR, array_splice($paths, 0, (count($paths)-1)));


        $layout = dirname(dirname(__DIR__)).$name.$this->ext;

        if(is_file($layout)){
             $this->layout = $layout;
        }else{
            throw new FileNotFoundException("Le layout introuvable $layout", 1);
        }
        return $this;
    }

    public function setGlobal(string $name, $value) : RendererInterface
    {
        $this->globals[$name] = $value;
        return $this;
    }

    public function setExtension(string $name, $value) : RendererInterface
    {
        $this->extensions[$name] =$value;
        return $this;
    }


    public function getFolder()
    {
        return $this->folder;
    }

    public function getLayout()
    {
        return $this->layout;
    }

    public function getGlobal(string $name)
    {
        return $this->globals[$name];
    }
    public function getAllGlobals()
    {
        return $this->globals;
    }
    public function getExtension(string $name)
    {
        return $this->extensions[$name];
    }

    public function getAllExtensions()
    {
        return $this->extensions;
    }

    /**
     * Url pour les differentes parties de la vue
     *
     * @param string $name
     * @return void
     */
    public function component(string $path) 
    {
        
        $path = $this->replacePointbySlash($this->removesliashstartingofurl($path));

        $paths = explode(DIRECTORY_SEPARATOR, $path);

        $paths = array_map(function($item){

            if(strpos($item, $this->prefix)!==0){
                $item = $this->prefix.$item; 
            }
            return $item;

        }, $paths);

        $path = DIRECTORY_SEPARATOR.join(DIRECTORY_SEPARATOR, $paths);

        $name = $this->replacePointbySlash($this->partielLayoutPath.$path) . $this->ext;

        $page = dirname(dirname(__DIR__)) . $name;
        extract($this->globals);
        extract($this->extensions);
        ob_start();
        require $page;
        return ob_get_clean();
    }

    public function viewPath(string $view) : self
    {
        $this->viewPath = $view;
        return $this;
    }

    public function getViewPath(): string
    {
        return $this->viewPath;
    }


    public function render(?string $view = null, ?array $variables=[], bool $opt = null)
    {
        
        $view = $this->replacePointbySlash($this->removesliashstartingofurl($view));

        $folders = explode(DIRECTORY_SEPARATOR, $view);

        $folders[0] .= $this->getFolder();
        
        $paths = array_map(function($item){

            if(strpos($item, $this->prefix)!==0){
                $item = $this->prefix.$item; 
            }
            $item = DIRECTORY_SEPARATOR . strtolower($item);

            return $item;

        }, $folders);

        $fiche = str_replace($this->prefix, "", end($paths));

        $paths = array_splice($paths, 0, (count($paths)-1), [$fiche]);
        $paths[] = $fiche;
        
        $f = join("", $paths)."_aec_views". $this->ext;

        $page = $this->viewPath.$f;

        if(!file_exists($page)){
            throw new FileNotFoundException("La vue  $page est introuvable", 1);
        }

        extract($this->extensions);
        extract($this->globals);
        extract($variables);

        if($opt===null)
        {
            ob_start();
                require $page;
            return ob_get_clean();
        }else if($opt === true)// si l'on desire le layout
        {
            ob_start();
            require $page;
            $body = ob_get_clean();
            ob_start();
            require $this->getLayout();
            return ob_get_clean();
        }
        
      
    }



    private function removesliashstartingofurl(string $url) : string
    {
        if(strpos($url, "/")===0 || strpos($url, DIRECTORY_SEPARATOR)===0){
            $url = substr($url, 1, mb_strlen($url));
         }
        
        return $url;
    }
    
    private function replacePointbySlash(string $url): string 
    {

        return str_replace("/", DIRECTORY_SEPARATOR, 
                str_replace(".", DIRECTORY_SEPARATOR, $url)
            );
    }






















}