<?php

use aeCorp\aec_src\aec_modules\aec_accueil\aec_config\AccueilWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$widget = Create::factory(AccueilWidgetExtension::class, [$this]);

$this->addArray("frontFirstLineMenu", [
    "Accueil"=>$widget
]);
$this->addArray("adminMenu", [
    "Accueil"=>$widget
]);


return [
    
];
