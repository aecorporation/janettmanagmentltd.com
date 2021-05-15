<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities;

use aeCorp\aec_core\EntiteAbstract;

/**
 * Le nom de la classe doit commencer par une lettre majuscule
 */
class Useradmin extends EntiteAbstract
{
    private ?int $id_useradmin = null;
    private ?string $code_useradmin = null;
    private ?string $image_useradmin = null;
    private ?string $piece_useradmin = null;
    private ?string $numpiece_useradmin = null;
    private ?string $nom_useradmin = null; 
    private ?string $prenoms_useradmin = null;
    private ?string $dateNais_useradmin = null;
    private ?string $lieuNais_useradmin = null; 
    private ?string $sexe_useradmin = null;
    private ?string $sitMatr_useradmin = null;
    private ?int $nbenf_useradmin = null;
    private ?string $contact_useradmin = null;
    private ?string $email_useradmin = null; 
    private ?string $adresse_useradmin = null; 
    private ?string $bp_useradmin = null; 
    private ?string $pays_useradmin = null; 
    private ?string $ville_useradmin = null; 
    private ?string $quartier_useradmin = null; 
    private ?string $login_useradmin = null; 
    private ?string $loginC_useradmin = null; 
    private ?string $mdp_useradmin = null; 
    private ?string $mdpC_useradmin = null; 
    private ?string $codePrivilege_useradmin = null; 
    private ?Privilege $privilege_useradmin = null;
    private $menusForbiden_useradmin; 
    private $actionsForbiden_useradmin; 
    private $menusAuthorised_useradmin; 
    private $actionsAuthorised_useradmin; 

    private ?int $etat_useradmin = null;





    /**
     * Get the value of id_useradmin
     */ 
    public function getId_useradmin() : ?int
    {
        return $this->id_useradmin;
    }

    /**
     * Set the value of id_useradmin
     *
     * @return  self
     */ 
    public function setId_useradmin(?int $id_useradmin) : EntiteAbstract
    {
        $this->id_useradmin = $id_useradmin;
        $this->vars = array_merge($this->vars, ["id_useradmin" => $id_useradmin]);

        return $this;
    }

    /**
     * Get the value of code_useradmin
     */ 
    public function getCode_useradmin() : ?string
    {
        return $this->code_useradmin;
    }

    /**
     * Set the value of code_useradmin
     *
     * @return  self
     */ 
    public function setCode_useradmin(?string $code_useradmin) : EntiteAbstract
    {
        $this->code_useradmin = $code_useradmin;
        $this->vars = array_merge($this->vars, ["code_useradmin" => $code_useradmin]);

        return $this;
    }

    /**
     * Get the value of image_useradmin
     */ 
    public function getImage_useradmin() : ?string
    {
        return $this->image_useradmin;
    }

    /**
     * Set the value of image_useradmin
     *
     * @return  self
     */ 
    public function setImage_useradmin(?string $image_useradmin) : EntiteAbstract
    {
        $this->image_useradmin = $image_useradmin;
        $this->vars = array_merge($this->vars, ["image_useradmin" => $image_useradmin]);

        return $this;
    }

    /**
     * Get the value of nom_useradmin
     */ 
    public function getNom_useradmin() : ?string
    {
        return $this->nom_useradmin;
    }

    /**
     * Set the value of nom_useradmin
     *
     * @return  self
     */ 
    public function setNom_useradmin(?string $nom_useradmin) : ?EntiteAbstract
    {
        $this->nom_useradmin = $nom_useradmin;
        $this->vars = array_merge($this->vars, ["nom_useradmin" => $nom_useradmin]);

        return $this;
    }

    /**
     * Get the value of prenoms_useradmin
     */ 
    public function getPrenoms_useradmin() : ?string
    {
        return $this->prenoms_useradmin;
    }

    /**
     * Set the value of prenoms_useradmin
     *
     * @return  self
     */ 
    public function setPrenoms_useradmin(?string $prenoms_useradmin) : ?EntiteAbstract
    {
        $this->prenoms_useradmin = $prenoms_useradmin;
        $this->vars = array_merge($this->vars, ["prenoms_useradmin" => $prenoms_useradmin]);

        return $this;
    }

    /**
     * Get the value of dateNais_useradmin
     */ 
    public function getDateNais_useradmin() : ?string
    {
        return $this->dateNais_useradmin;
    }

    /**
     * Set the value of dateNais_useradmin
     *
     * @return  self
     */ 
    public function setDateNais_useradmin(string $dateNais_useradmin) : ?EntiteAbstract
    {
        $this->dateNais_useradmin = $dateNais_useradmin;
        $this->vars = array_merge($this->vars, ["dateNais_useradmin" => $dateNais_useradmin]);

        return $this;
    }

    /**
     * Get the value of lieuNais_useradmin
     */ 
    public function getLieuNais_useradmin()
    {
        return $this->lieuNais_useradmin;
    }

    /**
     * Set the value of lieuNais_useradmin
     *
     * @return  self
     */ 
    public function setLieuNais_useradmin(?string $lieuNais_useradmin) : EntiteAbstract
    {
        $this->lieuNais_useradmin = $lieuNais_useradmin;
        $this->vars = array_merge($this->vars, ["lieuNais_useradmin" => $lieuNais_useradmin]);

        return $this;
    }

    /**
     * Get the value of sexe_useradmin
     */ 
    public function getSexe_useradmin() : ?string
    {
        return $this->sexe_useradmin;
    }

    /**
     * Set the value of sexe_useradmin
     *
     * @return  self
     */ 
    public function setSexe_useradmin(?string $sexe_useradmin) : ?EntiteAbstract
    {
        $this->sexe_useradmin = $sexe_useradmin;
        $this->vars = array_merge($this->vars, ["sexe_useradmin" => $sexe_useradmin]);

        return $this;
    }

    /**
     * Get the value of sitMatr_useradmin
     */ 
    public function getSitMatr_useradmin() : ?string
    {
        return $this->sitMatr_useradmin;
    }

    /**
     * Set the value of sitMatr
     *
     * @return  self
     */ 
    public function setSitMatr_useradmin(?string $sitMatr_useradmin) : EntiteAbstract
    {
        $this->sitMatr_useradmin = $sitMatr_useradmin;
        $this->vars = array_merge($this->vars, ["sitMatr_useradmin" => $sitMatr_useradmin]);

        return $this;
    }

    /**
     * Get the value of contact_useradmin
     */ 
    public function getcontact_useradmin() : ?string
    {
        return $this->contact_useradmin;
    }

    /**
     * Set the value of contact_useradmin
     *
     * @return  self
     */ 
    public function setcontact_useradmin(?string $contact_useradmin) : EntiteAbstract
    {
        $this->contact_useradmin = $contact_useradmin;
        $this->vars = array_merge($this->vars, ["contact_useradmin" => $contact_useradmin]);

        return $this;
    }

    /**
     * Get the value of email_useradmin
     */ 
    public function getEmail_useradmin() : ?string
    {
        return $this->email_useradmin;
    }

    /**
     * Set the value of email_useradmin
     *
     * @return  self
     */ 
    public function setEmail_useradmin(?string $email_useradmin) : ?EntiteAbstract
    {
        $this->email_useradmin = $email_useradmin;
        $this->vars = array_merge($this->vars, ["email_useradmin" => $email_useradmin]);
        return $this;
    }

    /**
     * Get the value of adresse_useradmin
     */ 
    public function getAdresse_useradmin() : ?string
    {
        return $this->adresse_useradmin;
    }

    /**
     * Set the value of adresse_useradmin
     *
     * @return  self
     */ 
    public function setAdresse_useradmin(?string $adresse_useradmin) : EntiteAbstract
    {
        $this->adresse_useradmin = $adresse_useradmin;
        $this->vars = array_merge($this->vars, ["adresse_useradmin" => $adresse_useradmin]);

        return $this;
    }

     /**
     * Get the value of bp_useradmin
     */ 
    public function getBp_useradmin() : ?string
    {
        return $this->bp_useradmin;
    }

    /**
     * Set the value of bp_useradmin
     *
     * @return  self
     */ 
    public function setBp_useradmin(?string $bp_useradmin) : EntiteAbstract
    {
        $this->bp_useradmin = $bp_useradmin;
        $this->vars = array_merge($this->vars, ["bp_useradmin" => $bp_useradmin]);

        return $this;
    }

    /**
     * Get the value of pays_useradmin
     */ 
    public function getPays_useradmin() : ?string
    {
        return $this->pays_useradmin;
    }

    /**
     * Set the value of pays_useradmin
     *
     * @return  self
     */ 
    public function setPays_useradmin(?string $pays_useradmin) : EntiteAbstract
    {
        $this->pays_useradmin = $pays_useradmin;
        $this->vars = array_merge($this->vars, ["pays_useradmin" => $pays_useradmin]);

        return $this;
    }

    /**
     * Get the value of ville_useradmin
     */ 
    public function getVille_useradmin() : ?string
    {
        return $this->ville_useradmin;
    }

    /**
     * Set the value of ville_useradmin
     *
     * @return  self
     */ 
    public function setVille_useradmin(?string $ville_useradmin) : EntiteAbstract
    {
        $this->ville_useradmin = $ville_useradmin;
        $this->vars = array_merge($this->vars, ["ville_useradmin" => $ville_useradmin]);

        return $this;
    }

    /**
     * Get the value of quartier_useradmin
     */ 
    public function getQuartier_useradmin() : ?string
    {
        return $this->quartier_useradmin;
    }

    /**
     * Set the value of quartier_useradmin
     *
     * @return  self
     */ 
    public function setQuartier_useradmin(?string $quartier_useradmin) : ?EntiteAbstract
    {
        $this->quartier_useradmin = $quartier_useradmin;
        $this->vars = array_merge($this->vars, ["quartier_useradmin" => $quartier_useradmin]);

        return $this;
    }

    /**
     * Get the value of login_useradmin
     */ 
    public function getLogin_useradmin() : ?string
    {
        return $this->login_useradmin;
    }

    /**
     * Set the value of login_useradmin
     *
     * @return  self
     */ 
    public function setLogin_useradmin(?string $login_useradmin) : EntiteAbstract
    {
        $this->login_useradmin = $login_useradmin;
        $this->vars = array_merge($this->vars, ["login_useradmin" => $login_useradmin]);

        return $this;
    }

    /**
     * Get the value of loginC_useradmin
     */ 
    public function getLoginC_useradmin() : ?string
    {
        return $this->loginC_useradmin;
    }

    /**
     * Set the value of loginC_useradmin
     *
     * @return  self
     */ 
    public function setLoginC_useradmin(?string $loginC_useradmin) : ?EntiteAbstract
    {
        $this->loginC_useradmin = $loginC_useradmin;
        $this->vars = array_merge($this->vars, ["loginC_useradmin" => $loginC_useradmin]);

        return $this;
    }

    /**
     * Get the value of mdp_useradmin
     */ 
    public function getMdp_useradmin() : ?string
    {
        return $this->mdp_useradmin;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp_useradmin(?string $mdp_useradmin) : ?EntiteAbstract
    {
        $this->mdp_useradmin = $mdp_useradmin;
        $this->vars = array_merge($this->vars, ["mdp_useradmin" => $mdp_useradmin]);

        return $this;
    }

    /**
     * Get the value of mdpC_useradmin
     */ 
    public function getMdpC_useradmin() : ?string
    {
        return $this->mdpC_useradmin;
    }

    /**
     * Set the value of mdpC_useradmin
     *
     * @return  self
     */ 
    public function setMdpC_useradmin(?string $mdpC_useradmin) : EntiteAbstract
    {
        $this->mdpC_useradmin = $mdpC_useradmin;
        $this->vars = array_merge($this->vars, ["mdpC_useradmin" => $mdpC_useradmin]);

        return $this;
    }

    /**
     * Get the value of codePrivilege_useradmin
     */ 
    public function getCodePrivilege_useradmin() : ?string
    {
        return $this->codePrivilege_useradmin;
    }

    /**
     * Set the value of codePrivilege_useradmin
     *
     * @return  self
     */ 
    public function setCodePrivilege_useradmin(?string $codePrivilege_useradmin) : EntiteAbstract
    {
        $this->codePrivilege_useradmin = $codePrivilege_useradmin;
        $this->vars = array_merge($this->vars, ["codePrivilege_useradmin" => $codePrivilege_useradmin]);

        return $this;
    }

    
    /**
     * Get the value of Privilege_useradmin
     */ 
    public function getPrivilege_useradmin() : ?Privilege
    {
        return $this->privilege_useradmin;
    }

    /**
     * Set the value of privilege_useradmin
     *
     * @return  self
     */ 
    public function setPrivilege_useradmin(?Privilege $privilege_useradmin) : EntiteAbstract
    {
        $this->privilege_useradmin = $privilege_useradmin;
        $this->vars = array_merge($this->vars, ["privilege_useradmin" => $privilege_useradmin]);

        return $this;
    }

    /**
     * Get the value of menusForbiden_useradmin
     */ 
    public function getMenusForbiden_useradmin()
    {
        return $this->menusForbiden_useradmin;
    }

    /**
     * Set the value of menusForbiden_useradmin
     *
     * @return  self
     */ 
    public function setMenusForbiden_useradmin($menusForbiden_useradmin) : ?EntiteAbstract
    {
        $this->menusForbiden_useradmin = $menusForbiden_useradmin;
        $this->vars = array_merge($this->vars, ["menusForbiden_useradmin" => $menusForbiden_useradmin]);

        return $this;
    }

    /**
     * Get the value of actionsForbiden_useradmin
     */ 
    public function getActionsForbiden_useradmin()
    {
        return $this->actionsForbiden_useradmin;
    }

    /**
     * Set the value of actionsForbiden_useradmin
     *
     * @return  self
     */ 
    public function setActionsForbiden_useradmin($actionsForbiden_useradmin) : ?EntiteAbstract
    {
        $this->actionsForbiden_useradmin = $actionsForbiden_useradmin;
        $this->vars = array_merge($this->vars, ["actionsForbiden_useradmin" => $actionsForbiden_useradmin]);

        return $this;
    }

    /**
     * Get the value of menusAuthorised_useradmin
     */ 
    public function getMenusAuthorised_useradmin()
    {
        return $this->menusAuthorised_useradmin;
    }

    /**
     * Set the value of menusAuthorised_useradmin
     *
     * @return  self
     */ 
    public function setMenusAuthorised_useradmin($menusAuthorised_useradmin) : ?EntiteAbstract
    {
        $this->menusAuthorised_useradmin = $menusAuthorised_useradmin;
        $this->vars = array_merge($this->vars, ["menusAuthorised_useradmin" => $menusAuthorised_useradmin]);

        return $this;
    }

    /**
     * Get the value of actionsAuthorised_useradmin
     */ 
    public function getActionsAuthorised_useradmin()
    {
        return $this->actionsAuthorised_useradmin;
    }

    /**
     * Set the value of actionsAuthorised
     *
     * @return  self
     */ 
    public function setActionsAuthorised_useradmin($actionsAuthorised_useradmin) : ?EntiteAbstract
    {
        $this->actionsAuthorised_useradmin = $actionsAuthorised_useradmin;
        $this->vars = array_merge($this->vars, ["actionsAuthorised" => $actionsAuthorised_useradmin]);

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat_useradmin() : ?int
    {
        return $this->etat_useradmin;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat_useradmin(?int $etat_useradmin) : ?EntiteAbstract
    {
        $this->etat_useradmin = $etat_useradmin;
        $this->vars = array_merge($this->vars, ["etat_useradmin" => $etat_useradmin]);

        return $this;
    }


    

    /**
     * Get the value of piece_useradmin
     */ 
    public function getPiece_useradmin() : ?string
    {
        return $this->piece_useradmin;
    }

    /**
     * Set the value of piece_useradmin
     *
     * @return  self
     */ 
    public function setPiece_useradmin(?string $piece_useradmin) : ?EntiteAbstract
    {
        $this->piece_useradmin = $piece_useradmin;
        $this->vars = array_merge($this->vars, ["piece_useradmin" => $piece_useradmin]);

        return $this;
    }

    /**
     * Get the value of numpiece_useradmin
     */ 
    public function getNumpiece_useradmin() : ?string
    {
        return $this->numpiece_useradmin;
    }

    /**
     * Set the value of numpiece_useradmin
     *
     * @return  self
     */ 
    public function setNumpiece_useradmin(?string $numpiece_useradmin) : ?EntiteAbstract
    {
        $this->numpiece_useradmin = $numpiece_useradmin;
        $this->vars = array_merge($this->vars, ["numpiece_useradmin" => $numpiece_useradmin]);

        return $this;
    }

    /**
     * Get the value of nbenf_useradmin
     */ 
    public function getNbenf_useradmin() : ?int
    {
        return $this->nbenf_useradmin;
    }

    /**
     * Set the value of nbenf_useradmin
     *
     * @return  self
     */ 
    public function setNbenf_useradmin(?int $nbenf_useradmin) : ?EntiteAbstract
    {
        $this->nbenf_useradmin = $nbenf_useradmin;
        $this->vars = array_merge($this->vars, ["nbenf_useradmin" => $nbenf_useradmin]);

        return $this;
    }
}