<?php

namespace aeCorp\aec_src\aec_modules\aec_blog\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Blog extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_blog = null;
    private ?string $code_blog  = null;
    private ?string $titre_blog  = null;
    private ?string $soustitre_blog  = null;
    private ?string $details_blog  = null;
    private ?string $image_blog  = null;
    private ?string $menu_blog  = null;
    private ?string $date_at_blog  = null;
    

    

    /**
     * Get the value of id_blog
     */ 
    public function getId_blog() : ?int
    {
        return $this->id_blog;
    }

    /**
     * Set the value of id_blog
     *
     * @return  self
     */ 
    public function setId_blog(?int $id_blog) : EntiteAbstract
    {
        $this->id_blog = $id_blog;
        $this->vars = array_merge($this->vars, ["id_blog" => $id_blog]);
        return $this;
    }

    /**
     * Get the value of code_blog
     */ 
    public function getCode_blog() : ?string
    {
        return $this->code_blog;
    }

    /**
     * Set the value of code_blog
     *
     * @return  self
     */ 
    public function setCode_blog(?string $code_blog) : EntiteAbstract
    {
        $this->code_blog = $code_blog;
        $this->vars = array_merge($this->vars, ["code_blog" => $code_blog]);
        return $this;
    }

     /**
     * Get the value of titre_blog
     */ 
    public function getTitre_blog() : ?string
    {
        return $this->titre_blog;
    }

    /**
     * Set the value of titre_blog
     *
     * @return  self
     */ 
    public function setTitre_blog(?string $titre_blog) : EntiteAbstract
    {
        $this->titre_blog = $titre_blog;
        $this->vars = array_merge($this->vars, ["titre_blog" => $titre_blog]);
        return $this;
    }

    /**
     * Get the value of soustitre_blog
     */ 
    public function getSoustitre_blog() : ?string
    {
        return $this->soustitre_blog;
    }

    /**
     * Set the value of soustitre_blog
     *
     * @return  self
     */ 
    public function setSoustitre_blog(?string $soustitre_blog) : EntiteAbstract
    {
        $this->soustitre_blog = $soustitre_blog;
        $this->vars = array_merge($this->vars, ["soustitre_blog" => $soustitre_blog]);
        return $this;
    }

    

     /**
     * Get the value of details_blog
     */ 
    public function getDetails_blog() : ?string
    {
        return $this->details_blog;
    }

    /**
     * Set the value of details_blog
     *
     * @return  self
     */ 
    public function setDetails_blog(?string $details_blog) : EntiteAbstract
    {
        $this->details_blog = $details_blog;
        $this->vars = array_merge($this->vars, ["details_blog" => $details_blog]);
        return $this;
    }

      /**
     * Get the value of image_blog
     */ 
    public function getImage_blog() : ?string
    {
        return $this->image_blog;
    }

    /**
     * Set the value of image_blog
     *
     * @return  self
     */ 
    public function setImage_blog(?string $image_blog) : EntiteAbstract
    {
        $this->image_blog = $image_blog;
        $this->vars = array_merge($this->vars, ["image_blog" => $image_blog]);
        return $this;
    }


      /**
     * Get the value of menu_blog
     */ 
    public function getMenu_blog() : ?string
    {
        return $this->menu_blog;
    }

    /**
     * Set the value of menu_blog
     *
     * @return  self
     */ 
    public function setMenu_blog(?string $menu_blog) : EntiteAbstract
    {
        $this->menu_blog = $menu_blog;
        $this->vars = array_merge($this->vars, ["menu_blog" => $menu_blog]);
        return $this;
    }

    
    /**
     * Get the value of date_at_blog
     */ 
    public function getDate_at_blog() : ?string 
    {
        return $this->date_at_blog;
    }

    /**
     * Set the value of date_at_blog
     *
     * @return  self
     */ 
    public function setDate_at_blog(?string $date_at_blog) : EntiteAbstract
    {
        $this->date_at_blog = $date_at_blog;
        $this->vars = array_merge($this->vars, ["date_at_blog" => $date_at_blog]);

        return $this;
    }
}