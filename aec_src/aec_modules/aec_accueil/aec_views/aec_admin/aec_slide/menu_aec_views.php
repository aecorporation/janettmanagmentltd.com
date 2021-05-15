<?php $routing1 = $router->getRoutes()["admin.site.slide"]; ?>

<div class="row" style="margin-bottom:0px;">
    <span class="col-12">
        <div class="row">
                <span class="col-12" style="padding-left:30px;font-size:12px; padding:7px;">
                    <a style="color:#333; cursor:pointer;" onClick="Rooter.rootingComponent(this)" aec-rooter-view="mainRooter" href="<?=$router->generateUri($routing1["name"], ["action"=>"slide"])?>">
                        <i class="<?=$routing1["icon"]?>"> </i> <?=$routing1["title"]?> 
                    </a>
                </span>
        </div>
    </span>


</div>
