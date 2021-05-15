			<div class="row" style="border:0px solid #DDD; height:120px; box-shadow:0 5px 5px #DDD;">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="font-size:11px; padding:2px;" align="center">
                    <img src="<?= $container->get("folder.img") ?>logo.png" class="img-fluid" style="width:100px;"/></br>
                    </div>
                </div>
                <div class="row" style="border:0px solid red; height:90%; overflow:auto; padding-top:5px;">
                <aside class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="font-size:14px; color:#333333;">
                    
                        <?php foreach($container->get("adminMenu") as $item){ ?>
                            <?=$item->menuRender("")?>
                        <?php } ?>
                        
                </aside>


			</div>
