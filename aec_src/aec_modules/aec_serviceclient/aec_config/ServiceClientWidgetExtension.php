<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_config;

use aeCorp\aec_utils\aec_renderer\Widget;

class ServiceClientWidgetExtension extends Widget
{

    public function menuRender(?string $option) : ?string{

        return $this->renderer->render("serviceclient.front.menu", ["option"=>$option]);
 
     }
     public function componentRender(?string $option) : ?string{
 
         return null;
     }

    


}
