<?php


namespace aeCorp\aec_utils\aec_filemanager;

use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_checkerrors\Error;
use aeCorp\aec_utils\aec_filemanager\Image;


class FileManager
{


    private $file= null;
    private ?array $extensions = [];
    private ?string $nomImg= null;
    private ?int $min=null;
    private ?int $max = null;
    private $tmp = null;
    private  $name = null;
    private ?int $size = null;
    private  $info = null;
    private  $extension = null;
    private  $type = null;
    private ?array $result = [];
    private ?array $errors = [];
    private ?string $folder=null;
    private ?string $getContent = null;
    private ?int $index=null;

    public function __construct(?array $params = []){

        if(!empty($params)){

            $this->extensions = $params["extensions"] ?? [];
            $this->nomImg = $params["nomImg"] ?? null;
            $this->min = $params["min"] ?? null;
            $this->max = $params["max"] ?? null;
            $this->folder= $params["folder"] ?? null;
            $this->setName($params["name"] ?? null);

        }

    }

    public function setName(?string $name = null) : FileManager {
        $this->name = $name;
        $this->file = isset($name) ? $_FILES[$this->name] : null;
        return $this;
    }
    public function getName() :string {
        return $this->name;
    }

    public function setFolder(string $folder) : FileManager {
        $this->folder = $folder;
        return $this;
    }
    public function getFolder() :string {
        return $this->folder;
    }

    public function setExtensions(array $extensions) : FileManager {
        $this->extensions = $extensions;
        return $this;
    }
    public function getExtensions() :array {
        return $this->extensions;
    }

    public function setNomImg(string $nomImg) : FileManager {
        $this->nomImg = $nomImg;
        return $this;
    }
    public function getNomImg() :string {
        return $this->nomImg;
    }

    public function setMin(int $min) : FileManager {
        $this->min = $min;
        return $this;
    }
    public function getMin() :int {
        return $this->min;
    }

    public function setMax(int $max) : FileManager {
        $this->max = $max;
        return $this;
    }
    public function getMax() :int {
        return $this->max;
    }

    public function resizeOnce($destination, $largeurMax, $hauteurMax) : self
    {
        if ($this->file['size'] <= $this->max) {
            $this->infos         = pathinfo($this->file['name']);
            $this->extension      = strtolower($this->infos['extension']);

            if (in_array($this->extension, $this->extensions)) {
                $infos   = getimagesize($this->file['tmp_name']);
                $largeur = $infos[0];
                $hauteur = $infos[1];

                if($largeur > $largeurMax || $hauteur > $hauteurMax) {

                if ($this->extension == 'jpg' || $this->extension == 'jpeg' || $this->extension == 'JPG' || $this->extension == 'JPEG') {
                    $objImage = imagecreatefromjpeg($this->file['tmp_name']);
                } elseif ($this->extension == 'gif') {
                    $objImage = imagecreatefromgif($this->file['tmp_name']);
                } else {
                    $objImage = imagecreatefrompng($this->file['tmp_name']);
                }

                if ($largeur >= $hauteur && $largeur > $largeurMax) {
                    // REDUCTION PAR LA LARGEUR
                    $nouvelleLargeur = $largeurMax;
                    $reduction       = (($largeurMax * 100) / $largeur);
                    $nouvelleHauteur = (($hauteur * $reduction) / 100);
                } else {
                    // REDUCTION PAR LA HAUTEUR
                    $nouvelleHauteur = $hauteurMax;
                    $reduction       = (($hauteurMax * 100) / $hauteur);
                    $nouvelleLargeur = (($largeur * $reduction) / 100);
                }

                $nouvelleImage = imagecreatetruecolor($nouvelleLargeur, $nouvelleHauteur);

                if ($this->extension == 'png') {
                    // fond transparent (pour les png avec transparence)
                    imagesavealpha($nouvelleImage, true);
                    $trans_color = imagecolorallocatealpha($nouvelleImage, 0, 0, 0, 127);
                    imagefill($nouvelleImage, 0, 0, $trans_color);
                }

                imagecopyresampled($nouvelleImage, $objImage, 0, 0, 0, 0, $nouvelleLargeur, $nouvelleHauteur, $largeur, $hauteur);
                imagedestroy($objImage);

                if ($this->extension == 'jpg' || $this->extension == 'jpeg' || $this->extension == 'JPG' || $this->extension == 'JPEG') {
                    imagejpeg($nouvelleImage, $destination . $this->nomImg . '.' . $this->extension, 100);
                    return 1;
                } elseif ($this->extension == 'gif') {
                    imagegif($nouvelleImage, $destination . $this->nomImg . '.' . $this->extension);
                    return 1;
                } else {
                    imagepng($nouvelleImage, $destination . $this->nomImg . '.' . $this->extension, 9);
                    return 1;
                }
                }
			    else {
				if(move_uploaded_file($this->file['tmp_name'], $destination. $this->nomImg.'.'.$this->extension)){
				}}
            }
        }
        return $this;
    }

/**
 * $pseudo est le nouveau nom du fichier facultatif
 * $checked = 1 ou 0 pour permettre une verification ou pas de uploading du fichier
 */
    public function once(?string $pseudo = null, bool $checked= false): self
    {
        $this->tmp = $this->file["tmp_name"];

        if ($checked === true) {

            if (!$this->isLoaded($pseudo)) {
                return $this;
            }
        }
        if($this->file["tmp_name"]!==""){

            $this->name = $this->file["name"];
            $this->size = $this->file["size"];
            $this->type = $this->file["type"];
            $this->info = pathinfo($this->name);
            $this->extension = $this->info["extension"];
            $this->getContent = file_get_contents($this->tmp);

            if ($this->nomImg) {

                $this->name = $this->nomImg. "." . $this->extension;

            }
            if ($this->extensions) {
                $this->validExtension($this->extensions);
            }
            if ($this->min || $this->max) {
                $this->validSize($this->min, $this->max);
            }
            $this->result[] = Create::factory(
                Image::class,
                [
                    [
                        "index" =>  0,
                        "name" =>  $this->name,
                        "tmp" => $this->tmp,
                        "size" => $this->size,
                        "type" => $this->type,
                        "extension" => $this->extension,
                        "content" => $this->getContent
                    ]
                ]
            );
        }
         return $this;
    }

    public function getIndex(){
        return $this->index;
    }

    public function multiple(?string $pseudo=null, bool $checked= false) : self
    {
        $nb = count($this->file["tmp_name"]);

        $index = 0;
        
        for ($i = 0; $i < $nb; $i++) {

            $index++;

            $this->tmp = $this->file["tmp_name"][$i];
            $this->index = $i;

            if($checked=== true){
                
                if (!$this->isLoaded($pseudo)) {
                    return $this;
                }

            }


           if($this->file["tmp_name"][$i]!==""){

                $this->name = $this->file["name"][$i];
                $this->size = $this->file["size"][$i];
                $this->info = pathinfo($this->name);
                $this->extension = $this->info["extension"];
                $this->getContent = file_get_contents($this->tmp);

                if ($this->nomImg) {

                       
                    $this->name = $this->nomImg . "_".$i."." . $this->extension;
                    
                }

                if ($this->extensions) {
                    $this->validExtension($this->extensions);
                }

                if ($this->min || $this->max) {
                    $this->validSize($this->min, $this->max);
                }
                
                $params = [
                    "index" =>  $index,
                    "name" =>  $this->name,
                    "tmp" => $this->tmp,
                    "size" => $this->size,
                    "type" => $this->type,
                    "extension" => $this->extension,
                    "content" => $this->getContent
                ];
                $this->result[] = Create::factory(Image::class, [$params]);

           }
        }
        return  $this;
    }

    public function getContent(){
        return $this->getContent;
    }

    public function move(?string $folder=null, ?string $nomImg=null) : self
    {
        if ($folder !== null) {
            $folder = $folder;
        } else {
            $folder = $this->folder;
        }
    
        if(!\file_exists($folder))
        {
            $this->errors[$this->name] = (string)  Create::factory(Error::class, [$folder, "errorFoundMoveFolder"]);
        }else{
       
            foreach ($this->result as $key) {

                $name = "";
                
                if ($nomImg !== null) {
                    $name = $nomImg.".".$this->extension;
                }else{
                    $name = $key->getName();
                }

                $key->setName($name);

                $moved = move_uploaded_file($key->getTmp(), $folder . $key->getName());

               
                if (!$moved) {
                    $this->errors[$this->name] = (string) Create::factory(Error::class, [$key->getName(), "errorMoveFile"]);
                break;
                }
            }
           
        }
        return $this;
    }

   

    public static function delete(string $path)
    {
        return \unlink($path);
    }


    public function getErrors()
    {
        return $this->errors;
    }

    public function getResult()
    {
        return $this->result;
    }
    public function isValid()
    {
        return empty($this->errors);
    }

    public function validSize(?int $min=null, ?int $max=null)
    {
        if($min !==null &&  $max !==null)
        {
                if ($this->size < $min || $this->size > $max)
                {
                $this->errors[$this->name] = (string) Create::factory(Error::class, [$this->name, "betweenSizeFile", [$min,  $max]]);
                }
        } else if($min !==null && $max===null)
         {
           
            if ($this->size < $min)
            {
                $this->errors[$this->name] = (string) Create::factory(Error::class, [$this->name, "minSizeFile", [$min]]);
            }
        } else if($min===null && $max !==null)
        {
           
            if ($this->size > $max)
            {
                $this->errors[$this->name] = (string) Create::factory(Error::class, [$this->name, "maxSizeFile"]);
            }
        }
        return $this;
    }

     public function validExtension(array $extensions)
    {
        if(!in_array($this->extension, $extensions))
        {
            $this->errors[$this->name] = (string) Create::factory(Error::class, [$this->extension, "invalidFileExtension", [$this->name]]);
        }
        return $this;
    }

    public  function isLoaded(?string $pseudo= null) : ?bool
    {
        if($pseudo){
            $this->name = $pseudo;
        }

        if(is_array($this->tmp))
        {
                if (empty($this->tmp[0]) || $this->tmp[0] === "" || is_null($this->tmp[0])) {
                 $this->errors[$this->name] = (string) Create::factory(Error::class, [$this->name, "notFileLoaded"]);
                return false;
                }else{
                return true;
                }
               
        }else{
            if (empty($this->tmp) || $this->tmp==="" || is_null($this->tmp)) {
                 $this->errors[$this->name] = (string) Create::factory(Error::class, [$this->name, "notFileLoaded_"]);
                 return false;
            }else{
                return true;
            }
           
        }
    }


    public static function createFile(string $path)
    {
        if (fopen($path, "w+")) {
            return true;
        } else {
           // $this->errors["notCreateFile"] = (string) Create::factory(Error::class, ["Fichier", "notCreateFile"]);
            return false;
        }
    }

    public static function moveFile($dossierSource , $dossierDestination){

        $retour = 1; 
        if(!file_exists($dossierSource)) { 
         $retour = -1; 
        } else { 
         if(!copy($dossierSource, $dossierDestination)) { 
         $retour = -2; 
         } else { 
         if(!unlink($dossierSource)) { 
         $retour = -3; 
         } 
         } 
        } 
        return($retour);
    }

             
    public static function fileExists($path)
    {
        if (\file_exists($path)) {
          return true;
        } else {
            return false;
        }
    }

    public static function createFolder($path) :bool
    {
        $result =false;

        if (is_array($path)) {
            foreach ($path as $key => $value) {
              //  self::createFolder($value);
                if (!\file_exists($value)) {
                    if (mkdir($value, 0777)) {
                        $result = true;
                    } else {
                        // $this->errors["notCreateFolder"] = (string) Create::factory(Error::class, ["Dossier", "notCreateFolder"]);
                        $result = false;
                    }
                } else {
                    //$this->errors["notCreateFolder"] = (string) Create::factory(Error::class, ["Dossier", "notCreateFolder"]);
                    $result = false;
                }
            }
        }else {
                if (!\file_exists($path)) {
                    if (mkdir($path, 0777)) {
                        $result = true;
                    } else {
                        // $this->errors["notCreateFolder"] = (string) Create::factory(Error::class, ["Dossier", "notCreateFolder"]);
                        $result = false;
                    }
                } else {
                    //$this->errors["notCreateFolder"] = (string) Create::factory(Error::class, ["Dossier", "notCreateFolder"]);
                    $result = false;
                }
            return  $result;
           
        }
       return $result;

        }

    public static function IMAGE_EXTS(){
        return ["png", "PNG", "jpg", "JPG", "jpeg", "JPEG"];
    }

    public static function MULTIPLE_EXTS(){
        return array_merge(self::IMAGE_EXTS(), 
                        self::VIDEO_EXTS(), 
                        self::AUDIOS_EXTS(), 
                        self::FILES_EXTS()
                    );
    }

    public static function VIDEO_EXTS(){
        return ["MP4", "mp4"];
    }

    public static function AUDIOS_EXTS(){
        return ["MP3", "mp3"];
    }

    public static function FILES_EXTS(){
        return ["docx", "doc", "pdf", "PDF"];
    }

    public static function FILES(?string $name = ""){

        return $_FILES[$name];
    }

    public static function HAS_FILES(?string $name = ""){

        return isset($_FILES[$name]) ? true : false;
    }

    public static function FILES_TMP(?string $name = ""){

        return $_FILES[$name]["tmp_name"];
        
    }

    public static function FILES_EXISTS(?string $name = ""){

        $tmps = self::FILES_TMP($name);

        if(is_string($tmps)){

            return ($tmps !== "") ? true : false;

        }
        else if(is_array($tmps)){

            $ar  = array_filter($tmps, function($item){
                return $item !== "";
            });

            return (count($ar)>0) ? true : false;

        }else{
            return false;
        }
    }

   
          
   



}


   