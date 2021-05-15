<?php $routing1 = $router->getRoutes()["admin.administrateur.gestion"]; ?>

<div class="row mb-2" aec-method-routing="GET">   
    <div class="col-12">
        <a class="aec-menu-bars" href="<?=$router->generateUri($routing1["name"], ["action"=>"gestion"])?>">
            <span style="text-transform:uppercase"><i class="<?=$routing1["icon"]?>"> </i> <?=$routing1["title"]?> </span>
        </a>
    </div>
</div>
