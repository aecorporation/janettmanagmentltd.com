<?php

use aeCorp\aec_src\aec_modules\aec_blog\aec_config\BlogWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$this->addArray("adminMenu", [
    "blog"=>Create::factory(BlogWidgetExtension::class, [$this])
]);

return [
    
];
