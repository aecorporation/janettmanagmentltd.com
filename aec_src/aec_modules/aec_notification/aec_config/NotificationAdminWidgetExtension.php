<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_notification\aec_config;

use aeCorp\aec_src\aec_modules\aec_notification\aec_models\NotificationModel;
use aeCorp\aec_utils\aec_renderer\Widget;

class NotificationAdminWidgetExtension extends Widget
{


    public function menuRender(?string $option) : ?string{

        $model = $this->container->get(NotificationModel::class);

        $countNotify = $model->count(["dateview_notification IS NULL"]);

        return $this->renderer->render("notification.admin.menu", [

            "countNotify"=>$countNotify

        ]);
    }
    public function componentRender(?string $option) : ?string{

        return $this->renderer->render("notification.admin.notification");

    }

    


}
