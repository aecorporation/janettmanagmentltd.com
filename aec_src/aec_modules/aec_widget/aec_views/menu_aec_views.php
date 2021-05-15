
<div class="container-fluid">

        <div class="row" style="min-height:35px;border-bottom:1px solid #CC3789;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <span class="title_way">
                    <?php foreach(array_merge($container->get("frontUnderMenu"), $container->get("frontFootMenu")) as $menu){?>
                        <?=$menu->menuRender("frontUnderMenu")?>
                    <?php } ?>
                
                </span>
            </div>
        </div>
</div>