<?php

namespace aeCorp\aec_src\aec_entities;

use aeCorp\core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Exemple extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?type $attributs = DefaultValue;
    

    

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