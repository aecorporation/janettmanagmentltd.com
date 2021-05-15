<?php

namespace aeCorp\aec_utils\aec_renderer;

/**
 * Page.
 *
 * @author	aeCorporation
 * @since	v0.0.1
 * @version	v1.0.0	Lundi, 9 Decembre  2019.
 * @see		Component
 * @global
 */
interface RendererInterface 
{

    public function setFolder(string $url) : RendererInterface;

    public function setLayout(string $name) : RendererInterface;

    public function setGlobal(string $name, $value) : RendererInterface;

    public function setExtension(string $name, $value) : RendererInterface;

    public function viewPath(string $view) : RendererInterface;

    public function getViewPath(): string;


    public function getFolder();

    public function getLayout();

    public function getGlobal(string $name);

    public function getAllGlobals();

    public function getExtension(string $name);

    public function getAllExtensions();

    public function render(string $view = null, ?array $variables=[], bool $opt = null);
}
