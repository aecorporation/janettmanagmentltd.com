
 <head>
 <title>CONNEXION</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="aecorporation">
   <meta name="Revisit-after" content="2 days" />
   <meta name="description" content="">
   <meta name="keywords" content="Foncier Côte d'Ivoire">
   <base href="./" />
   <link rel="shortcut icon" type="image/png" href="favicon.png" />

   <?php if($container->has("css.plugins")){?>
    <?php foreach($container->get("css.plugins") as $css){?>
      <link rel="stylesheet" href="<?= $container->get("folder.plugin.css") ?><?= $css?>" />
    <?php } ?>

   <?php } ?>

   <?php foreach($container->get("index.css") as $css){?>
    <link rel="stylesheet" href="<?= $container->get("folder.vuejs") ?><?= $css?>" />
   <?php } ?>

 </head>
 
