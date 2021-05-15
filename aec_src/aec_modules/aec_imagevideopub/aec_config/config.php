<?php

use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_config\ImagevideopubWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$this->addArray("adminMenu", [
    "imagevideopub"=>Create::factory(ImagevideopubWidgetExtension::class, [$this])
]);

return [
    
];
