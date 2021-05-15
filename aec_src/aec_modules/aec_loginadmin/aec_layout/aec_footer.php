<div class="col-12 text-dark text-right  bg-light"  style="font-size: 12px; height:5%;position:fixed; bottom:0;""> Designed by aeCorporation</div>

    <?php if($container->has("js.plugins")){?>
        <?php foreach($container->get("js.plugins") as $js){?>
            <script type="text/javascript" src="<?= $container->get("folder.plugin.js") ?><?= $js?>"></script>
        <?php } ?>

   <?php } ?>

   <?php foreach($container->get("index.js") as $js){?>
    <script src="<?= $container->get("folder.vuejs") ?><?= $js?>"></script>
   <?php } ?>
   