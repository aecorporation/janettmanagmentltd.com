<?php

namespace aeCorp\aec_src\aec_modules\aec_admin\aec_entities;

use aeCorp\aec_core\EntiteAbstract;

/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Admin extends EntiteAbstract
{
    
    

    

    /**
     * Get the value of attribut
     */ 
    public function getAttribut() : ?int
    {
        return $this->attributs;
    }

    /**
     * Set the value of attribut
     *
     * @return  self
     */ 
    public function setAttribut(?type $attributs) : EntiteAbstract
    {
        $this->attributs = $attributs;
        $this->vars = array_merge($this->vars, ["attributs" => $attributs]);
        return $this;
    }

}