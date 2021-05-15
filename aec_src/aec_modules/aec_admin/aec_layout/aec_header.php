<?php
  // session_start();
  //  $AUTH_USER = 'aecorporation';
  // 	$AUTH_PASS = 'ADM.aecorporation';
  // 	header('Cache-Control: no-cache, must-revalidate, max-age=0');
  // 	$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
  // 	$is_not_authenticated = (
  // 		!$has_supplied_credentials ||
  // 		$_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
  // 		$_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
  // 	);
  // 	if ($is_not_authenticated) {
  // 		header('HTTP/1.1 401 Authorization Required');
  // 		header('WWW-Authenticate: Basic realm="Access denied"');
  // 		exit;
  // 	}
  ?>

 <head>
 <title>ADMIN - JANETT MANAGEMENT - LTD</title>
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
    <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">-->


   <?php } ?>

   <?php foreach($container->get("index.css") as $css){?>
    <link rel="stylesheet" href="<?= $container->get("folder.vuejs") ?><?= $css?>" />
   <?php } ?>

 </head>
 
