<?php $routing1 = $router->getRoutes()["admin.imagevideopub.gestion"]; ?>

<div class="row mb-2" aec-method-routing="GET">   
    <span class="col-12">
        <a class="aec-menu-bars" href="<?=$router->generateUri($routing1["name"], ["action"=>"gestion"])?>">
            <span style="text-transform:uppercase"><i class="fa fa-video"></i> IMAGES DE FOND </span
        </a>
    </span>
</div>
