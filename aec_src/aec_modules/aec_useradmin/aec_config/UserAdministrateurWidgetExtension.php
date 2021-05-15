<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_config;

use aeCorp\aec_utils\aec_renderer\Widget;

class UserAdministrateurWidgetExtension extends Widget
{


    public function menuRender(?string $option) : ?string{

       return $this->renderer->render("useradmin.admin.menu", ["option"=>$option]);

    }
    public function componentRender(?string $option) : ?string{

        return null;
    }

    


}
