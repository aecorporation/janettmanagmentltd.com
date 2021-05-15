<?php

use aeCorp\aec_src\aec_modules\aec_admin\aec_config\DashbordAdminWidgetExtension;
use aeCorp\aec_utils\aec_factory\Create;

$this->set("admin.prefix", "/admin");
$this->set("login.admin", "/login_admin");

$this->addArray("adminMenu", [
    "Dashbord"=>Create::factory(DashbordAdminWidgetExtension::class, [$this])
]);

return [
    "admin.css"=>["admin.css"],
    "admin.js"=>["admin.js"],
];
