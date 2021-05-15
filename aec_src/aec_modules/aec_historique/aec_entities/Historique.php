<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_entities;

use aeCorp\aec_core\EntiteAbstract;

/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Historique extends EntiteAbstract
{
    private ?int $id_historique = null;
    private ?string $titre_historique = null;
    private ?string $detailsobject_historique = null;
    private ?string $foreignKey_historique = null;
    private ?string $libele_historique = null;
    private ?string $type_historique = null;
    private ?string $date_at_historique = null;
    private ?string $auteur_historique = null;
    private  $user_historique = null;
    
    public function __construct(array $data=[]) {

        parent::__construct($data);

    }
    /**
     * Get the value of id_historique
     */ 
    public function getId_historique() : ?int
    {
        return $this->id_historique;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId_historique(?int $id_historique = null) : ?EntiteAbstract
    {
        $this->id = $id_historique;
        $this->vars = array_merge($this->vars, ["id_historique" => $id_historique]);
        return $this;
    }

    /**
     * Get the value of titre_historique
     */ 
    public function getTitre_historique() : ?string
    {
        return $this->titre_historique;
    }

    /**
     * Set the value of titre_historique
     *
     * @return  self
     */ 
    public function setTitre_historique(?string $titre_historique = null) : ?EntiteAbstract
    {
        $this->titre_historique = $titre_historique;
        $this->vars = array_merge($this->vars, ["titre_historique" => $titre_historique]);
        return $this;
    }

    /**
     * Get the value of detailsobject_historique
     */ 
    public function getDetailsobject_historique() : ?string
    {
        return $this->detailsobject_historique;
    }

    /**
     * Set the value of detailsobject_historique
     *
     * @return  self
     */ 
    public function setDetailsobject_historique(?string $detailsobject_historique = null) : ?EntiteAbstract
    {
        $this->detailsobject_historique = $detailsobject_historique;
        $this->vars = array_merge($this->vars, ["detailsobject_historique" => $detailsobject_historique]);
        return $this;
    }

    /**
     * Get the value of libele_historique
     */ 
    public function getLibele_historique() : ?string
    {
        return $this->libele_historique;
    }

    /**
     * Set the value of libele
     *
     * @return  self
     */ 
    public function setLibele_historique(?string $libele_historique = null) : ?EntiteAbstract
    {
        $this->libele_historique = $libele_historique;
        $this->vars = array_merge($this->vars, ["libele_historique" => $libele_historique]);
        return $this;
    }

    /**
     * Get the value of foreignKey_historique
     */ 
    public function getForeignKey_historique() : ?string
    {
        return $this->foreignKey_historique;
    }

    /**
     * Set the value of foreignKey_historique
     *
     * @return  self
     */ 
    public function setForeignKey_historique(?string $foreignKey_historique = null) : ?EntiteAbstract
    {
        $this->foreignKey_historique = $foreignKey_historique;
        $this->vars = array_merge($this->vars, ["foreignKey_historique" => $foreignKey_historique]);
        return $this;
    }

    /**
     * Get the value of type_historique
     */ 
    public function getType_historique() : ?string
    {
        return $this->type_historique;
    }

    /**
     * Set the value of type_historique
     *
     * @return  self
     */ 
    public function setType_historique(?string $type_historique = null) : ?EntiteAbstract
    {
        $this->type_historique = $type_historique;
        $this->vars = array_merge($this->vars, ["type_historique" => $type_historique]);
        return $this;
    }

    /**
     * Get the value of auteur_historique
     */ 
    public function getAuteur_historique() : ?string
    {
        return $this->auteur_historique;
    }

    /**
     * Set the value of auteur_historique
     *
     * @return  self
     */ 
    public function setAuteur_historique(?string $auteur_historique = null) : ?EntiteAbstract
    {
        $this->auteur_historique = $auteur_historique;
        $this->vars = array_merge($this->vars, ["auteur_historique" => $auteur_historique]);
        return $this;
    }

    
    /**
     * Get the value of date_at_historique
     */ 
    public function getDate_at_historique() : ?string
    {
        return $this->date_at_historique;
    }

    /**
     * Set the value of date_at
     *
     * @return  self
     */ 
    public function setDate_at_historique(?string $date_at_historique = null) : ?EntiteAbstract
    {
        $this->date_at_historique = $date_at_historique;
        $this->vars = array_merge($this->vars, ["date_at_historique" => $date_at_historique]);
        return $this;
    }

    public function getUser_historique()
    {
        return $this->user_historique;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser_historique($user_historique = null) : ?EntiteAbstract
    {
        $this->user_historique = $user_historique;
        $this->vars = array_merge($this->vars, ["user_historique" => $user_historique]);
        return $this;
    }







}