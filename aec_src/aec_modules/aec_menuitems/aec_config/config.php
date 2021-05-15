<?php

use aeCorp\aec_src\aec_modules\aec_menuitems\aec_config\MenuitemsWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$this->addArray("adminMenu", [
    "menuitems"=>Create::factory(MenuitemsWidgetExtension::class, [$this])
]);

return [
    
];
