<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_entities;

use aeCorp\aec_core\EntiteAbstract;
/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Notification extends EntiteAbstract
{
    /**
     * Lister en privée les attributs avec leur type et assigner une valeur par defaut
     * le signe ? signifie peut etre null
     */
    private ?int $id_notification = null;
    private ?string $expediteur_notification  = null;
    private ?string $destinataire_notification  = null;
    private ?string $contenu_notification  = null;
    private ?string $type_of_notification  = null;
    private ?string $date_at_notification  = null;
    private ?string $dateview_notification  = null;
    private ?string $objetconcerne_notification  = null;
    
    /**
     * Get the value of id_notification
     */ 
    public function getId_notification() : ?int
    {
        return $this->id_notification;
    }

    /**
     * Set the value of id_notification
     *
     * @return  self
     */ 
    public function setId_notification(?int $id_notification) : EntiteAbstract
    {
        $this->id_notification = $id_notification;
        $this->vars = array_merge($this->vars, ["id_notification" => $id_notification]);
        return $this;
    }


    /**
     * Get the value of expediteur_notification
     */ 
    public function getExpediteur_notification() : ?string
    {
        return $this->expediteur_notification;
    }

    /**
     * Set the value of expediteur_notification
     *
     * @return  self
     */ 
    public function setExpediteur_notification(?string $expediteur_notification) : EntiteAbstract
    {
        $this->expediteur_notification = $expediteur_notification;
        $this->vars = array_merge($this->vars, ["expediteur_notification" => $expediteur_notification]);
        return $this;
    }


     /**
     * Get the value of contenu_notification
     */ 
    public function getContenu_notification() : ?string
    {
        return $this->contenu_notification;
    }

    /**
     * Set the value of contenu_notification
     *
     * @return  self
     */ 
    public function setContenu_notification(?string $contenu_notification) : EntiteAbstract
    {
        $this->contenu_notification = $contenu_notification;
        $this->vars = array_merge($this->vars, ["contenu_notification" => $contenu_notification]);
        return $this;
    }

    
    /**
     * Get the value of type_of_notification
     */ 
    public function getType_of_notification() : ?string 
    {
        return $this->type_of_notification;
    }

    /**
     * Set the value of type_of_notification
     *
     * @return  self
     */ 
    public function setType_of_notification(?string $type_of_notification) : EntiteAbstract
    {
        $this->type_of_notification = $type_of_notification;
        $this->vars = array_merge($this->vars, ["type_of_notification" => $type_of_notification]);

        return $this;
    }

    
     /**
     * Get the value of destinataire_notification
     */ 
    public function getDestinataire_notification() : ?string 
    {
        return $this->destinataire_notification;
    }

    /**
     * Set the value of destinataire_notification
     *
     * @return  self
     */ 
    public function setDestinataire_notification(?string $destinataire_notification) : EntiteAbstract
    {
        $this->destinataire_notification = $destinataire_notification;
        $this->vars = array_merge($this->vars, ["destinataire_notification" => $destinataire_notification]);

        return $this;
    }


    /**
     * Get the value of date_at_notification
     */ 
    public function getDate_at_notification() : ?string 
    {
        return $this->date_at_notification;
    }

    /**
     * Set the value of date_at_notification
     *
     * @return  self
     */ 
    public function setDate_at_notification(?string $date_at_notification) : EntiteAbstract
    {
        $this->date_at_notification = $date_at_notification;
        $this->vars = array_merge($this->vars, ["date_at_notification" => $date_at_notification]);

        return $this;
    }

 /**
     * Get the value of dateview_notification
     */ 
    public function getDateview_notification() : ?string
    {
        return $this->dateview_notification;
    }

    /**
     * Set the value of dateview_notification
     *
     * @return  self
     */ 
    public function setDateview_notification(?string $dateview_notification) : EntiteAbstract
    {
        $this->dateview_notification = $dateview_notification;
        $this->vars = array_merge($this->vars, ["dateview_notification" => $dateview_notification]);
        return $this;
    }


    /**
     * Get the value of objetconcerne_notification
     */ 
    public function getObjetconcerne_notification() : ?string
    {
        return $this->objetconcerne_notification;
    }

    /**
     * Set the value of objetconcerne_notification
     *
     * @return  self
     */ 
    public function setObjetconcerne_notification(?string $objetconcerne_notification) : EntiteAbstract
    {
        $this->objetconcerne_notification = $objetconcerne_notification;
        $this->vars = array_merge($this->vars, ["objetconcerne_notification" => $objetconcerne_notification]);
        return $this;
    }




}