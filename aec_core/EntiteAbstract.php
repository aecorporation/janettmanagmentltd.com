<?php

namespace aeCorp\aec_core;

/**
 * Class abstraite dont herite toutes les classes du dossier entite 
 * afin d'hydrater les donnees et de convertir les donnees en JSON
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre  2019.
 * @global
 */
abstract class EntiteAbstract implements \Jsonserializable{

    protected array $vars = [];
    protected array $listJson = [];
    protected array $histories = [];


    /**
     * le constructeur prend comme parametre un tableau pour l'hydratation.
     *
     * @access	public
     * @param	array	$data	
     * @return	void
     */
    public function __construct(array $data = []) {

        $this->hydrater($data);
        $this->vars = $data;

    }

    public function getHistories() : ?array
    {
        return $this->histories;
    }

    public function setHistories(array $histories = []) : ?self
    {
        $this->histories = $histories;
        return $this;
    }
        /**
         * jsonserialize function implementée depuis l'interface  Jsonserializable.
         * 
         * @access	public
         * @return	array
         */
        public function jsonserialize() : array 
        {
            foreach ($this->vars as $key => $value) {
                $getMethod="get".ucfirst($key);
                if(\is_callable(array($this,$getMethod))){
                    $this->listJson[$key]=$this->$getMethod();
                }
                
            }

            return $this->listJson;

        }

        private function hydrater(array $data = [])
        {
            foreach ($data as $key => $value) {

                $method = "set" . ucfirst($key);
                if (\is_callable(array($this, $method))) {
                    $this->$method($value);
                }

            }
        }

    public function arrayData(): array
    {
        return $this->jsonserialize();
    }


    

    }
