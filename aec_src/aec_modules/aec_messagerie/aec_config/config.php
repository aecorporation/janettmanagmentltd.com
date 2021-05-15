<?php

use aeCorp\aec_src\aec_modules\aec_messagerie\aec_config\MessagerieAdminWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$this->addArray("widgetAdminMsg",[
"MessagerieAmin"=>Create::factory(MessagerieAdminWidgetExtension::class, [$this])
]);

return [
];
