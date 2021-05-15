<?php $routing1 = $router->getRoutes()["admin.menuitems.gestion"]; ?>

<div class="row mb-2" aec-method-routing="GET">   
    <span class="col-12">
        <a class="aec-menu-bars" href="<?=$router->generateUri($routing1["name"], ["action"=>"gestion"])?>">
            <span style="text-transform:uppercase"><i class="fa fa-list"></i> SERVICES ET VISIONS </span>
        </a>
    </span>
</div>
