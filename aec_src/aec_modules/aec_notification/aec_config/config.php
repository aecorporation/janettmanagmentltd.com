<?php

use aeCorp\aec_src\aec_modules\aec_notification\aec_config\NotificationAdminWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_renderer\RendererInterface;

$ext = Create::factory(NotificationAdminWidgetExtension::class, [$this]);

$this->addArray("widgetAdminMsg",[
"notifAdmin"=>$ext
]);

$this->get(RendererInterface::class)->setExtension("notifViews", 
$ext
);

return
    [
    ];
