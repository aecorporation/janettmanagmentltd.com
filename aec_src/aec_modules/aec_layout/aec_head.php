<head>

    <title>JANETT MANAGEMENT LTD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="aecorporation">
    <meta name="Revisit-after" content="2 days" />
    <meta name="description" content="">
    <meta name="keywords" content="divineoreole.com">
    <base href="./" />

    <link rel="shortcut icon" type="image/png" href="favicon.png" />

    <?php if($container->has("css.plugins")):?>
        <?php foreach($container->get("css.plugins") as $css):?>
          <link rel="stylesheet" href="<?= $container->get("folder.plugin.css") ?><?= $css?>" />
        <?php endforeach ?>
    <?php endif ?>

    <?php foreach($container->get("index.css") as $css):?>
      <link rel="stylesheet" href="<?= $container->get("folder.vuejs") ?><?= $css?>" />
    <?php endforeach ?>

    
    

    <?php foreach($bg as $item):?>
     

        <style>

    <?php if($item->getMenu_imagevideopub() ==="qsn"):?>

          .content_page_qsn::before {    
              content: "";
              background-image: url('<?=$container->get("folder.img.imagevideopub")?><?=$item->getFichier_imagevideopub()?>');
              background-size: cover;
              position: absolute;
              top: 0px;
              right: 0px;
              bottom: 0px;
              left: 0px;
              opacity: 0.2;
              background-position: center;
              background-repeat: no-repeat;
          }
        <?php endif?>
        <?php if($item->getMenu_imagevideopub() ==="services"):?>

        .content_page_serv::before {    
            content: "";
            background-image: url('<?=$container->get("folder.img.imagevideopub")?><?=$item->getFichier_imagevideopub()?>');
            background-size: cover;
            position: fixed;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.2;
            background-position: center;
            background-repeat: no-repeat;
        }
        <?php endif?>


        a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
        a.gflag img {border:0;}
        a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
        #goog-gt-tt {display:none !important;}
        .goog-te-banner-frame {display:none !important;}
        .goog-te-menu-value:hover {text-decoration:none !important;}
        body {top:0 !important;}
        #google_translate_element2 {display:none!important;}

        </style>

    <?php endforeach ?>


 </head>
 
