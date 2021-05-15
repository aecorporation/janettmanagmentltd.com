<div class="row" id="aec-bg" style="height:100%;width:100%;background:#000;display:none; position:fixed; top:0; z-index:999;opacity:0.4;"></div>
<?php if(isset($notifViews)){?>
	<?=$notifViews->componentRender("")?>
<?php } ?>


<div class="modal fade" style="font-size:12px;" id="staticBackdrop" data-backdrop="true" style="background-color: rgba(0, 0, 0, 0.5);" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                    </div>
                </div>
    </div>

    <input type="hidden" id="csrf" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

    <input type="hidden" name="realtimes" action="<?=$router->generateUri("admin.realtimes.index")?>"/>

    <input type="hidden" name="admin_prefix" value="<?=$router->generateUri("admin.dashbord.index")?>"/>



    <?php if($container->has("js.plugins")){?>
	<?php foreach($container->get("js.plugins") as $js){?>
		<script type="text/javascript" src="<?= $container->get("folder.plugin.js") ?><?= $js?>"></script>
	<?php } ?>
<?php } ?>

<?php foreach($container->get("index.js") as $js){?>
    <script src="<?= $container->get("folder.vuejs") ?><?= $js?>"></script>
<?php } ?>


