<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Serviceclient extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_serviceclient = null;
    private ?string $menu_serviceclient  = null;
    private ?string $donnees_serviceclient  = null;
    private ?string $date_at_serviceclient  = null;
    
    /**
     * Get the value of id_serviceclient
     */ 
    public function getId_serviceclient() : ?int
    {
        return $this->id_serviceclient;
    }

    /**
     * Set the value of id_serviceclient
     *
     * @return  self
     */ 
    public function setId_serviceclient(?int $id_serviceclient) : EntiteAbstract
    {
        $this->id_serviceclient = $id_serviceclient;
        $this->vars = array_merge($this->vars, ["id_serviceclient" => $id_serviceclient]);
        return $this;
    }

    /**
     * Get the value of menu_serviceclient
     */ 
    public function getMenu_serviceclient() : ?string
    {
        return $this->menu_serviceclient;
    }

    /**
     * Set the value of menu_serviceclient
     *
     * @return  self
     */ 
    public function setMenu_serviceclient(?string $menu_serviceclient) : EntiteAbstract
    {
        $this->menu_serviceclient = $menu_serviceclient;
        $this->vars = array_merge($this->vars, ["menu_serviceclient" => $menu_serviceclient]);
        return $this;
    }


     /**
     * Get the value of donnees_serviceclient
     */ 
    public function getDonnees_serviceclient() : ?string
    {
        return $this->donnees_serviceclient;
    }

    /**
     * Set the value of donnees_serviceclient
     *
     * @return  self
     */ 
    public function setDonnees_serviceclient(?string $donnees_serviceclient) : EntiteAbstract
    {
        $this->donnees_serviceclient = $donnees_serviceclient;
        $this->vars = array_merge($this->vars, ["donnees_serviceclient" => $donnees_serviceclient]);
        return $this;
    }

    
    /**
     * Get the value of date_at_serviceclient
     */ 
    public function getDate_at_serviceclient() : ?string 
    {
        return $this->date_at_serviceclient;
    }

    /**
     * Set the value of date_at_serviceclient
     *
     * @return  self
     */ 
    public function setDate_at_serviceclient(?string $date_at_serviceclient) : EntiteAbstract
    {
        $this->date_at_serviceclient = $date_at_serviceclient;
        $this->vars = array_merge($this->vars, ["date_at_serviceclient" => $date_at_serviceclient]);

        return $this;
    }
}