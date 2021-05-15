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
interface WidgetInterface 
{

    public function menuRender(?string $option) : ?string;
    public function componentRender(?string $option) : ?string;

}
