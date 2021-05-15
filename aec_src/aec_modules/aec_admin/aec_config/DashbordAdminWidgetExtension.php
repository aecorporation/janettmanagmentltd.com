<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_admin\aec_config;

use aeCorp\aec_utils\aec_renderer\Widget;

class DashbordAdminWidgetExtension extends Widget
{


    public function menuRender(?string $option) : ?string{

       return $this->renderer->render("admin.menu", ["option"=>$option]);

    }
    public function componentRender(?string $option) : ?string{

        return null;
    }

    


}
