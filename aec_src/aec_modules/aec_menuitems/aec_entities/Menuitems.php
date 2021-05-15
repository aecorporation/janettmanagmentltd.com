<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Menuitems extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_menuitems = null;
    private ?string $code_menuitems  = null;
    private ?string $titre_menuitems  = null;
    private ?string $soustitre_menuitems  = null;
    private ?string $details_menuitems  = null;
    private ?string $image_menuitems  = null;
    private ?string $menu_menuitems  = null;
    private ?string $type_menuitems  = null;
    private ?string $date_at_menuitems  = null;
    

    

    /**
     * Get the value of id_menuitems
     */ 
    public function getId_menuitems() : ?int
    {
        return $this->id_menuitems;
    }

    /**
     * Set the value of id_menuitems
     *
     * @return  self
     */ 
    public function setId_menuitems(?int $id_menuitems) : EntiteAbstract
    {
        $this->id_menuitems = $id_menuitems;
        $this->vars = array_merge($this->vars, ["id_menuitems" => $id_menuitems]);
        return $this;
    }

    /**
     * Get the value of code_menuitems
     */ 
    public function getCode_menuitems() : ?string
    {
        return $this->code_menuitems;
    }

    /**
     * Set the value of code_menuitems
     *
     * @return  self
     */ 
    public function setCode_menuitems(?string $code_menuitems) : EntiteAbstract
    {
        $this->code_menuitems = $code_menuitems;
        $this->vars = array_merge($this->vars, ["code_menuitems" => $code_menuitems]);
        return $this;
    }

     /**
     * Get the value of titre_menuitems
     */ 
    public function getTitre_menuitems() : ?string
    {
        return $this->titre_menuitems;
    }

    /**
     * Set the value of titre_menuitems
     *
     * @return  self
     */ 
    public function setTitre_menuitems(?string $titre_menuitems) : EntiteAbstract
    {
        $this->titre_menuitems = $titre_menuitems;
        $this->vars = array_merge($this->vars, ["titre_menuitems" => $titre_menuitems]);
        return $this;
    }

    /**
     * Get the value of soustitre_menuitems
     */ 
    public function getSoustitre_menuitems() : ?string
    {
        return $this->soustitre_menuitems;
    }

    /**
     * Set the value of soustitre_menuitems
     *
     * @return  self
     */ 
    public function setSoustitre_menuitems(?string $soustitre_menuitems) : EntiteAbstract
    {
        $this->soustitre_menuitems = $soustitre_menuitems;
        $this->vars = array_merge($this->vars, ["soustitre_menuitems" => $soustitre_menuitems]);
        return $this;
    }

    

     /**
     * Get the value of details_menuitems
     */ 
    public function getDetails_menuitems() : ?string
    {
        return $this->details_menuitems;
    }

    /**
     * Set the value of details_menuitems
     *
     * @return  self
     */ 
    public function setDetails_menuitems(?string $details_menuitems) : EntiteAbstract
    {
        $this->details_menuitems = $details_menuitems;
        $this->vars = array_merge($this->vars, ["details_menuitems" => $details_menuitems]);
        return $this;
    }

      /**
     * Get the value of image_menuitems
     */ 
    public function getImage_menuitems() : ?string
    {
        return $this->image_menuitems;
    }

    /**
     * Set the value of image_menuitems
     *
     * @return  self
     */ 
    public function setImage_menuitems(?string $image_menuitems) : EntiteAbstract
    {
        $this->image_menuitems = $image_menuitems;
        $this->vars = array_merge($this->vars, ["image_menuitems" => $image_menuitems]);
        return $this;
    }


      /**
     * Get the value of menu_menuitems
     */ 
    public function getMenu_menuitems() : ?string
    {
        return $this->menu_menuitems;
    }

    /**
     * Set the value of menu_menuitems
     *
     * @return  self
     */ 
    public function setMenu_menuitems(?string $menu_menuitems) : EntiteAbstract
    {
        $this->menu_menuitems = $menu_menuitems;
        $this->vars = array_merge($this->vars, ["menu_menuitems" => $menu_menuitems]);
        return $this;
    }

    /**
     * Get the value of type_menuitems
     */ 
    public function getType_menuitems() :?string 
    {
        return $this->type_menuitems;
    }

    /**
     * Set the value of type_menuitems
     *
     * @return  self
     */ 
    public function setType_menuitems(?string $type_menuitems) : EntiteAbstract
    {
        $this->type_menuitems = $type_menuitems;
        $this->vars = array_merge($this->vars, ["type_menuitems" => $type_menuitems]);

        return $this;
    }


    
    /**
     * Get the value of date_at_menuitems
     */ 
    public function getDate_at_menuitems() : ?string 
    {
        return $this->date_at_menuitems;
    }

    /**
     * Set the value of date_at_menuitems
     *
     * @return  self
     */ 
    public function setDate_at_menuitems(?string $date_at_menuitems) : EntiteAbstract
    {
        $this->date_at_menuitems = $date_at_menuitems;
        $this->vars = array_merge($this->vars, ["date_at_menuitems" => $date_at_menuitems]);

        return $this;
    }
}