<?php

namespace aeCorp\aec_utils\aec_request;


interface ResponseInterface{

    /**
     * Envoyer au navigateur.
     *
     * @access	public
     * @return	void
     */
    public static function send(?int $status, ?string $path): void;


    /**
     * status de redirection.
     *
     * @access	public
     * @param	int	$taus	
     * @return	void
     */
    public static function status(?int $status): ResponseInterface;


    /**
     * Rediriger le client vers une url.
     *
     * @access	public
     * @param	string	$path	le chemin
     * @return	void
     */
     public static function   redirect(string $path): void;
   

}