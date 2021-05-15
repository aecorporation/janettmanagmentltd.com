<?php

namespace aeCorp\aec_core;

/**
 * Interface pour tous les classes de connexion de l'application
 * @var		object	InterfaceData
 * @global
 */
interface InterfaceData{

    /**
     * Methode a implementer pour les classes de connexion.
     *
     * @access	public static
     * @return	void
     */
    public function connect();

}