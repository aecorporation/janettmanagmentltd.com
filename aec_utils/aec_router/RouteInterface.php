<?php

namespace aeCorp\aec_utils\aec_router;

interface RouteInterface{

    /**
     * Nom de la route
     * .
     * @access	public
     * @return	string
     */
    public function getName() : string;
    /**
     * La fonction appelée pour la route.
     *
     * @access	public
     * @return	callable / string
     */
    public function getCallable();
    /**
     * Les parametres relatives a la route
     * .
     * @access	public
     * @return	array liste de chaine de caracteres
     */
    public function getParams(): array;
}