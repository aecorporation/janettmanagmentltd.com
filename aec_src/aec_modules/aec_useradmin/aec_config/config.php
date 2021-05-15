<?php

use aeCorp\aec_src\aec_modules\aec_useradmin\aec_config\UserAdministrateurWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$this->set("admin.prefix", "/admin");
$this->set("login.admin", "/login_admin");

$this->addArray("adminMenu", [
    "userAdmin"=>Create::factory(UserAdministrateurWidgetExtension::class, [$this])
]);

return [
];
