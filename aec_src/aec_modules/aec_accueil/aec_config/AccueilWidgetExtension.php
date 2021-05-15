<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_accueil\aec_config;

use aeCorp\aec_utils\aec_renderer\Widget;

class AccueilWidgetExtension extends Widget
{


    public function menuRender(?string $option) : ?string{

       return $this->renderer->render("accueil.front.menu", ["option"=>$option]);

    }
    public function componentRender(?string $option) : ?string{

        return null;
    }

    


}
