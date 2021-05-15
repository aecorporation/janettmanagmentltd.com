<?php

namespace aeCorp\aec_src\aec_modules\aec_menuitems\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Children_menuitems extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_children_menuitems = null;
    private ?string $code_children_menuitems = null;
    private ?string $contenu_children_menuitems  = null;
    private ?string $image_children_menuitems  = null;
    private ?string $codemenuitems_children_menuitems  = null;
    private ?string $date_at_children_menuitems  = null;
    

    

    /**
     * Get the value of id_children_menuitems
     */ 
    public function getId_children_menuitems() : ?int
    {
        return $this->id_children_menuitems;
    }

    /**
     * Set the value of id_children_menuitems
     *
     * @return  self
     */ 
    public function setId_children_menuitems(?int $id_children_menuitems) : EntiteAbstract
    {
        $this->id_children_menuitems = $id_children_menuitems;
        $this->vars = array_merge($this->vars, ["id_children_menuitems" => $id_children_menuitems]);
        return $this;
    }
    
     /**
     * Get the value of code_children_menuitems
     */ 
    public function getCode_children_menuitems() : ?string
    {
        return $this->code_children_menuitems;
    }

    /**
     * Set the value of Code_children_menuitems
     *
     * @return  self
     */ 
    public function setCode_children_menuitems(?string $code_children_menuitems) : EntiteAbstract
    {
        $this->code_children_menuitems = $code_children_menuitems;
        $this->vars = array_merge($this->vars, ["code_children_menuitems" => $code_children_menuitems]);
        return $this;
    }
    

     /**
     * Get the value of contenu_children_menuitems
     */ 
    public function getContenu_children_menuitems() : ?string
    {
        return $this->contenu_children_menuitems;
    }

    /**
     * Set the value of contenu_children_menuitems
     *
     * @return  self
     */ 
    public function setContenu_children_menuitems(?string $contenu_children_menuitems) : EntiteAbstract
    {
        $this->contenu_children_menuitems = $contenu_children_menuitems;
        $this->vars = array_merge($this->vars, ["contenu_children_menuitems" => $contenu_children_menuitems]);
        return $this;
    }

      /**
     * Get the value of image_children_menuitems
     */ 
    public function getImage_children_menuitems() : ?string
    {
        return $this->image_children_menuitems;
    }

    /**
     * Set the value of image_children_menuitems
     *
     * @return  self
     */ 
    public function setImage_children_menuitems(?string $image_children_menuitems) : EntiteAbstract
    {
        $this->image_children_menuitems = $image_children_menuitems;
        $this->vars = array_merge($this->vars, ["image_children_menuitems" => $image_children_menuitems]);
        return $this;
    }


    /**
     * Get the value of codemenuitems_children_menuitems
     */ 
    public function getcodemenuitems_children_menuitems() :?string 
    {
        return $this->codemenuitems_children_menuitems;
    }

    /**
     * Set the value of codemenuitems_children_menuitems
     *
     * @return  self
     */ 
    public function setcodemenuitems_children_menuitems(?string $codemenuitems_children_menuitems) : EntiteAbstract
    {
        $this->codemenuitems_children_menuitems = $codemenuitems_children_menuitems;
        $this->vars = array_merge($this->vars, ["codemenuitems_children_menuitems" => $codemenuitems_children_menuitems]);

        return $this;
    }


    
    /**
     * Get the value of date_at_children_menuitems
     */ 
    public function getdate_at_children_menuitems() : ?string 
    {
        return $this->date_at_children_menuitems;
    }

    /**
     * Set the value of date_at_children_menuitems
     *
     * @return  self
     */ 
    public function setdate_at_children_menuitems(?string $date_at_children_menuitems) : EntiteAbstract
    {
        $this->date_at_children_menuitems = $date_at_children_menuitems;
        $this->vars = array_merge($this->vars, ["date_at_children_menuitems" => $date_at_children_menuitems]);

        return $this;
    }
}