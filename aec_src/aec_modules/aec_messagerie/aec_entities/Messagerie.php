<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Messagerie extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_messagerie = null;
    private ?string $expediteur_messagerie  = null;
    private ?string $email_messagerie  = null;
    private ?string $contacts_messagerie  = null;
    private ?string $destinataire_messagerie  = null;
    private ?string $objet_messagerie  = null;
    private ?string $contenu_messagerie  = null;
    private ?string $date_at_messagerie  = null;
    private ?string $dateview_messagerie  = null;
    private ?string $type_messagerie  = null;
    private ?string $compagnie_messagerie  = null;
    
    /**
     * Get the value of id_messagerie
     */ 
    public function getId_messagerie() : ?int
    {
        return $this->id_messagerie;
    }

    /**
     * Set the value of id_messagerie
     *
     * @return  self
     */ 
    public function setId_messagerie(?int $id_messagerie) : EntiteAbstract
    {
        $this->id_messagerie = $id_messagerie;
        $this->vars = array_merge($this->vars, ["id_messagerie" => $id_messagerie]);
        return $this;
    }

    /**
     * Get the value of expediteur_messagerie
     */ 
    public function getExpediteur_messagerie() : ?string
    {
        return $this->expediteur_messagerie;
    }

    /**
     * Set the value of expediteur_messagerie
     *
     * @return  self
     */ 
    public function setExpediteur_messagerie(?string $expediteur_messagerie) : EntiteAbstract
    {
        $this->expediteur_messagerie = $expediteur_messagerie;
        $this->vars = array_merge($this->vars, ["expediteur_messagerie" => $expediteur_messagerie]);
        return $this;
    }


     /**
     * Get the value of email_messagerie
     */ 
    public function getEmail_messagerie() : ?string
    {
        return $this->email_messagerie;
    }

    /**
     * Set the value of email_messagerie
     *
     * @return  self
     */ 
    public function setEmail_messagerie(?string $email_messagerie) : EntiteAbstract
    {
        $this->email_messagerie = $email_messagerie;
        $this->vars = array_merge($this->vars, ["email_messagerie" => $email_messagerie]);
        return $this;
    }

    
    /**
     * Get the value of contacts_messagerie
     */ 
    public function getContacts_messagerie() : ?string 
    {
        return $this->contacts_messagerie;
    }

    /**
     * Set the value of contacts_messagerie
     *
     * @return  self
     */ 
    public function setContacts_messagerie(?string $contacts_messagerie) : EntiteAbstract
    {
        $this->contacts_messagerie = $contacts_messagerie;
        $this->vars = array_merge($this->vars, ["contacts_messagerie" => $contacts_messagerie]);

        return $this;
    }

     /**
     * Get the value of destinataire_messagerie
     */ 
    public function getDestinataire_messagerie() : ?string 
    {
        return $this->destinataire_messagerie;
    }

    /**
     * Set the value of destinataire_messagerie
     *
     * @return  self
     */ 
    public function setDestinataire_messagerie(?string $destinataire_messagerie) : EntiteAbstract
    {
        $this->mobile_messagdestinataire_messagerieerie = $destinataire_messagerie;
        $this->vars = array_merge($this->vars, ["destinataire_messagerie" => $destinataire_messagerie]);

        return $this;
    }

     /**
     * Get the value of objet_messagerie
     */ 
    public function getObjet_messagerie() : ?string 
    {
        return $this->objet_messagerie;
    }

    /**
     * Set the value of objet_messagerie
     *
     * @return  self
     */ 
    public function setObjet_messagerie(?string $objet_messagerie) : EntiteAbstract
    {
        $this->objet_messagerie = $objet_messagerie;
        $this->vars = array_merge($this->vars, ["objet_messagerie" => $objet_messagerie]);

        return $this;
    }

     /**
     * Get the value of contenu_messagerie
     */ 
    public function getContenu_messagerie() : ?string 
    {
        return $this->contenu_messagerie;
    }

    /**
     * Set the value of contenu_messagerie
     *
     * @return  self
     */ 
    public function setContenu_messagerie(?string $contenu_messagerie) : EntiteAbstract
    {
        $this->contenu_messagerie = $contenu_messagerie;
        $this->vars = array_merge($this->vars, ["contenu_messagerie" => $contenu_messagerie]);

        return $this;
    }

     /**
     * Get the value of date_at_messagerie
     */ 
    public function getDate_at_messagerie() : ?string 
    {
        return $this->date_at_messagerie;
    }

    /**
     * Set the value of date_at_messagerie
     *
     * @return  self
     */ 
    public function setDate_at_messagerie(?string $date_at_messagerie) : EntiteAbstract
    {
        $this->date_at_messagerie = $date_at_messagerie;
        $this->vars = array_merge($this->vars, ["date_at_messagerie" => $date_at_messagerie]);

        return $this;
    }

     /**
     * Get the value of dateview_messagerie
     */ 
    public function getDateview_messagerie() : ?string 
    {
        return $this->dateview_messagerie;
    }

    /**
     * Set the value of dateview_messagerie
     *
     * @return  self
     */ 
    public function setDateview_messagerie(?string $dateview_messagerie) : EntiteAbstract
    {
        $this->dateview_messagerie = $dateview_messagerie;
        $this->vars = array_merge($this->vars, ["dateview_messagerie" => $dateview_messagerie]);

        return $this;
    }

     /**
     * Get the value of type_messagerie
     */ 
    public function getType_messagerie() : ?string 
    {
        return $this->type_messagerie;
    }

    /**
     * Set the value of type_messagerie
     *
     * @return  self
     */ 
    public function setType_messagerie(?string $type_messagerie) : EntiteAbstract
    {
        $this->type_messagerie = $type_messagerie;
        $this->vars = array_merge($this->vars, ["type_messagerie" => $type_messagerie]);

        return $this;
    }

    /**
     * Get the value of compagnie_messagerie
     */ 
    public function getCompagnie_messagerie() : ?string 
    {
        return $this->compagnie_messagerie;
    }

    /**
     * Set the value of compagnie_messagerie
     *
     * @return  self
     */ 
    public function setCompagnie_messagerie(?string $compagnie_messagerie) : EntiteAbstract
    {
        $this->compagnie_messagerie = $compagnie_messagerie;
        $this->vars = array_merge($this->vars, ["compagnie_messagerie" => $compagnie_messagerie]);

        return $this;
    }










}