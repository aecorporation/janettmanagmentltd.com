<?php

use aeCorp\aec_src\aec_modules\aec_historique\aec_config\HistoriqueWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;


$this->addArray("adminMenu", [
    "UserAdmin"=>Create::factory(HistoriqueWidgetExtension::class, [$this])
]);

return [
];
