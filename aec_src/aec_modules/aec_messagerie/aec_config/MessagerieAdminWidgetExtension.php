<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_config;

use aeCorp\aec_src\aec_modules\aec_messagerie\aec_models\MessagerieModel;
use aeCorp\aec_utils\aec_renderer\Widget;

class MessagerieAdminWidgetExtension extends Widget
{


    public function menuRender(?string $option) : ?string{

        $model = $this->container->get(MessagerieModel::class);

        $countMsg = $model->count(["dateview_messagerie IS NULL"]);

       return $this->renderer->render("messagerie.admin.menu", [
           "option"=>$option,
           "countMsg"=>$countMsg
       ]);

    }
    public function componentRender(?string $option) : ?string{

        return null;
    }

    


}
