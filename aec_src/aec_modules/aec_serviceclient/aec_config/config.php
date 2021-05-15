<?php

use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_config\ServiceClientAdminWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$widget_ = Create::factory(ServiceClientAdminWidgetExtension::class, [$this]);


$this->addArray("adminMenu", [
    "ServiceClient"=>$widget_
]);
    
return
    [
    ];
