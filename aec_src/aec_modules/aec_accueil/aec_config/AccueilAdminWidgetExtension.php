<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_accueil\aec_config;

use aeCorp\aec_utils\aec_renderer\Widget;

class AccueilAdminWidgetExtension extends Widget
{


    public function menuRender(?int $option = 0) : ?string{

       return $this->renderer->render("accueil.admin.slide.menu", ["option"=>$option]);

    }
    public function componentRender() : ?string{
        return null;
    }

    


}
