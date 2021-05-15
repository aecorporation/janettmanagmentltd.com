<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities;

use aeCorp\aec_core\EntiteAbstract;

/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Privilege extends EntiteAbstract
{
    private ?int $id_privilege = null;
    private ?string $code_privilege = null;
    private ?string $nom_privilege = null;
    private ?string $details_privilege = null;
    private ?int $hierachie_privilege = null;
    private  $menus_privilege;
    private  $actions_privilege;

    public function __construct(array $data=[]) {

        parent::__construct($data);

    }
    /**
     * Get the value of id_privilege
     */ 
    public function getId_privilege() : ?int
    {
        return $this->id_privilege;
    }

    /**
     * Set the value of id_privilege
     *
     * @return  self
     */ 
    public function setId(?int $id_privilege = null) : ?EntiteAbstract
    {
        $this->id_privilege = $id_privilege;
        $this->vars = array_merge($this->vars, ["id_privilege" => $id_privilege]);
        return $this;
    }

    /**
     * Get the value of code_privilege
     */ 
    public function getCode_privilege() : ?string
    {
        return $this->code_privilege;
    }

    /**
     * Set the value of code_privilege
     *
     * @return  self
     */ 
    public function setCode_privilege(?string $code_privilege) : ?EntiteAbstract
    {
        $this->code_privilege = $code_privilege;
        $this->vars = array_merge($this->vars, ["code_privilege" => $code_privilege]);
        return $this;
    }

    /**
     * Get the value of nom_privilege
     */ 
    public function getNom_privilege() : ?string
    {
        return $this->nom_privilege;
    }

    /**
     * Set the value of nom_privilege
     *
     * @return  self
     */ 
    public function setNom_privilege(?string $nom_privilege) : ?EntiteAbstract
    {
        $this->nom_privilege = $nom_privilege;
        $this->vars = array_merge($this->vars, ["nom_privilege" => $nom_privilege]);

        return $this;
    }

    /**
     * Get the value of hierachie_privilege
     */ 
    public function getHierachie_privilege() : ?string
    {
        return $this->hierachie_privilege;
    }

    /**
     * Set the value of hierachie_privilege
     *
     * @return  self
     */ 
    public function setHierachie_privilege(?string $hierachie_privilege) : ?EntiteAbstract
    {
        $this->hierachie_privilege = $hierachie_privilege;
        $this->vars = array_merge($this->vars, ["hierachie_privilege" => $hierachie_privilege]);

        return $this;
    }

    /**
     * Get the value of details_privilege
     */ 
    public function getDetails_privilege() : ?string
    {
        return $this->details_privilege;
    }

    /**
     * Set the value of details_privilege
     *
     * @return  self
     */ 
    public function setDetails_privilege(?string $details_privilege) : ?EntiteAbstract
    {
        $this->details_privilege = $details_privilege;
        $this->vars = array_merge($this->vars, ["details_privilege" => $details_privilege]);

        return $this;
    }

    /**
     * Get the value of menus_privilege
     */ 
    public function getMenus_privilege()
    {
        return $this->menus_privilege;
    }
    

    /**
     * Set the value of menus_privilege
     *
     * @return  self
     */ 
    public function setMenus_privilege($menus_privilege) : ?EntiteAbstract
    {
        $this->menus_privilege = $menus_privilege;
        $this->vars = array_merge($this->vars, ["menus_privilege" => $menus_privilege]);

        return $this;
    }

    /**
     * Get the value of actions_privilege
     */ 
    public function getActions_privilege()
    {
        return $this->actions_privilege;
    }

    /**
     * Set the value of actions_privilege
     *
     * @return  self
     */ 
    public function setActions_privilege($actions_privilege) : ?EntiteAbstract
    {
        $this->actions_privilege = $actions_privilege;
        $this->vars = array_merge($this->vars, ["actions_privilege" => $actions_privilege]);

        return $this;
    }

}