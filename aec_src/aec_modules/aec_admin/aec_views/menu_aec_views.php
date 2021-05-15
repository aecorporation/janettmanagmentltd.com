<?php $routing = $router->getRoutes()["admin.dashbord.index"]; ?>
<div class="row mt-2 mb-2" aec-method-routing="GET">   
    <span class="col-12">
        <a class="aec-menu-bars aec-active" href="<?=$router->generateUri($routing["name"])?>">
            <span style="text-transform:uppercase"><i class="<?=$routing["icon"]?>"> </i> <?=$routing["title"]?> </span>
        </a>
    </span>
</div>
