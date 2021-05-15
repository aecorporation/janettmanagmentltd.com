<?php $item = $message->admin->menus[1]?>
<?php $routing1 = $router->getRoutes()["admin.administrateur.gestion"]; ?>


<div class="row" style="margin-bottom:20px;">
    <span class="col-12" style="font-weight:bold; text-transform:uppercase"><?=$item->title?></span>
    <span class="col-12">
        <div class="row">
                <span class="col-12" style="padding-left:30px;font-size:12px; padding:7px;">
                    <a style="color:#333; cursor:pointer;" onClick="Rooter.rootingComponent(this)" aec-rooter-view="mainRooter" href="<?=$router->generateUri($routing1["name"], ["action"=>"gestion"])?>">
                        <i class="<?=$routing1["icon"]?>"> </i> <?=$routing1["title"]?> 
                    </a>
                </span>
        </div>
    </span>
</div>
