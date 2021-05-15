<?php

namespace aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Imagevideopub extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_imagevideopub = null;
    private ?string $code_imagevideopub  = null;
    private ?string $titre_imagevideopub  = null;
    private ?string $soustitre_imagevideopub  = null;
    private ?string $details_imagevideopub  = null;
    private ?string $fichier_imagevideopub  = null;
    private ?string $menu_imagevideopub  = null;
    private ?int $position_imagevideopub  = null;
    private ?string $type_imagevideopub  = null;
    private ?string $typefile_imagevideopub  = null;
    private ?string $etat_imagevideopub  = null;
    private ?string $focus_imagevideopub  = null;
    private ?string $date_at_imagevideopub  = null;
    

    

    /**
     * Get the value of id_imagevideopub
     */ 
    public function getId_imagevideopub() : ?int
    {
        return $this->id_imagevideopub;
    }

    /**
     * Set the value of id_imagevideopub
     *
     * @return  self
     */ 
    public function setId_imagevideopub(?int $id_imagevideopub) : EntiteAbstract
    {
        $this->id_imagevideopub = $id_imagevideopub;
        $this->vars = array_merge($this->vars, ["id_imagevideopub" => $id_imagevideopub]);
        return $this;
    }

    /**
     * Get the value of code_imagevideopub
     */ 
    public function getCode_imagevideopub() : ?string
    {
        return $this->code_imagevideopub;
    }

    /**
     * Set the value of code_imagevideopub
     *
     * @return  self
     */ 
    public function setCode_imagevideopub(?string $code_imagevideopub) : EntiteAbstract
    {
        $this->code_imagevideopub = $code_imagevideopub;
        $this->vars = array_merge($this->vars, ["code_imagevideopub" => $code_imagevideopub]);
        return $this;
    }

     /**
     * Get the value of titre_imagevideopub
     */ 
    public function getTitre_imagevideopub() : ?string
    {
        return $this->titre_imagevideopub;
    }

    /**
     * Set the value of titre_imagevideopub
     *
     * @return  self
     */ 
    public function setTitre_imagevideopub(?string $titre_imagevideopub) : EntiteAbstract
    {
        $this->titre_imagevideopub = $titre_imagevideopub;
        $this->vars = array_merge($this->vars, ["titre_imagevideopub" => $titre_imagevideopub]);
        return $this;
    }

    /**
     * Get the value of soustitre_imagevideopub
     */ 
    public function getSoustitre_imagevideopub() : ?string
    {
        return $this->soustitre_imagevideopub;
    }

    /**
     * Set the value of soustitre_imagevideopub
     *
     * @return  self
     */ 
    public function setSoustitre_imagevideopub(?string $soustitre_imagevideopub) : EntiteAbstract
    {
        $this->soustitre_imagevideopub = $soustitre_imagevideopub;
        $this->vars = array_merge($this->vars, ["soustitre_imagevideopub" => $soustitre_imagevideopub]);
        return $this;
    }

    

     /**
     * Get the value of details_imagevideopub
     */ 
    public function getDetails_imagevideopub() : ?string
    {
        return $this->details_imagevideopub;
    }

    /**
     * Set the value of details_imagevideopub
     *
     * @return  self
     */ 
    public function setDetails_imagevideopub(?string $details_imagevideopub) : EntiteAbstract
    {
        $this->details_imagevideopub = $details_imagevideopub;
        $this->vars = array_merge($this->vars, ["details_imagevideopub" => $details_imagevideopub]);
        return $this;
    }

      /**
     * Get the value of fichier_imagevideopub
     */ 
    public function getFichier_imagevideopub() : ?string
    {
        return $this->fichier_imagevideopub;
    }

    /**
     * Set the value of fichier_imagevideopub
     *
     * @return  self
     */ 
    public function setFichier_imagevideopub(?string $fichier_imagevideopub) : EntiteAbstract
    {
        $this->fichier_imagevideopub = $fichier_imagevideopub;
        $this->vars = array_merge($this->vars, ["fichier_imagevideopub" => $fichier_imagevideopub]);
        return $this;
    }


      /**
     * Get the value of menu_imagevideopub
     */ 
    public function getMenu_imagevideopub() : ?string
    {
        return $this->menu_imagevideopub;
    }

    /**
     * Set the value of menu_imagevideopub
     *
     * @return  self
     */ 
    public function setMenu_imagevideopub(?string $menu_imagevideopub) : EntiteAbstract
    {
        $this->menu_imagevideopub = $menu_imagevideopub;
        $this->vars = array_merge($this->vars, ["menu_imagevideopub" => $menu_imagevideopub]);
        return $this;
    }

    /**
     * Get the value of position_imagevideopub
     */ 
    public function getPosition_imagevideopub() : ?int
    {
        return $this->position_imagevideopub;
    }

    /**
     * Set the value of position_imagevideopub
     *
     * @return  self
     */ 
    public function setPosition_imagevideopub(?int $position_imagevideopub) : EntiteAbstract
    {
        $this->position_imagevideopub = $position_imagevideopub;
        $this->vars = array_merge($this->vars, ["position_imagevideopub" => $position_imagevideopub]);
        return $this;
    }

    /**
     * Get the value of type_imagevideopub
     */ 
    public function getType_imagevideopub() :?string 
    {
        return $this->type_imagevideopub;
    }

    /**
     * Set the value of type_imagevideopub
     *
     * @return  self
     */ 
    public function setType_imagevideopub(?string $type_imagevideopub) : EntiteAbstract
    {
        $this->type_imagevideopub = $type_imagevideopub;
        $this->vars = array_merge($this->vars, ["type_imagevideopub" => $type_imagevideopub]);

        return $this;
    }

    /**
     * Get the value of typefile_imagevideopub
     */ 
    public function getTypefile_imagevideopub() :?string 
    {
        return $this->typefile_imagevideopub;
    }

    /**
     * Set the value of typefile_imagevideopub
     *
     * @return  self
     */ 
    public function setTypefile_imagevideopub(?string $typefile_imagevideopub) : EntiteAbstract
    {
        $this->typefile_imagevideopub = $typefile_imagevideopub;
        $this->vars = array_merge($this->vars, ["typefile_imagevideopub" => $typefile_imagevideopub]);

        return $this;
    }

    /**
     * Get the value of etat_imagevideopub
     */ 
    public function getEtat_imagevideopub() :?string 
    {
        return $this->etat_imagevideopub;
    }

    /**
     * Set the value of etat_imagevideopub
     *
     * @return  self
     */ 
    public function setEtat_imagevideopub(?string $etat_imagevideopub) : EntiteAbstract
    {
        $this->etat_imagevideopub = $etat_imagevideopub;
        $this->vars = array_merge($this->vars, ["etat_imagevideopub" => $etat_imagevideopub]);

        return $this;
    }

    /**
     * Get the value of focus_imagevideopub
     */ 
    public function getFocus_imagevideopub() : ?string 
    {
        return $this->focus_imagevideopub;
    }

    /**
     * Set the value of focus_imagevideopub
     *
     * @return  self
     */ 
    public function setFocus_imagevideopub(?string $focus_imagevideopub) : EntiteAbstract
    {
        $this->focus_imagevideopub = $focus_imagevideopub;
        $this->vars = array_merge($this->vars, ["focus_imagevideopub" => $focus_imagevideopub]);

        return $this;
    }

    
    /**
     * Get the value of date_at_imagevideopub
     */ 
    public function getDate_at_imagevideopub() : ?string 
    {
        return $this->date_at_imagevideopub;
    }

    /**
     * Set the value of date_at_imagevideopub
     *
     * @return  self
     */ 
    public function setDate_at_imagevideopub(?string $date_at_imagevideopub) : EntiteAbstract
    {
        $this->date_at_imagevideopub = $date_at_imagevideopub;
        $this->vars = array_merge($this->vars, ["date_at_imagevideopub" => $date_at_imagevideopub]);

        return $this;
    }
}