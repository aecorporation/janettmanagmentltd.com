<!DOCTYPE html>
<html lang="en">
<?= $renderer->component("header") ?>
<body>

	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 offset-xl-5 offset-lg-5 offset-ms-4 offset-sm-3 offset-0 alert fixed-top p-0" 
		style="z-index:9999999; display: none;font-size:12px;box-shadow:2px 2px 5px #444; color:#000; height: 40px;" align="center" role="alert" id="msg"></div>	
	</div>
	<main class="row">
		<header class="col-12 fixed-top app_parts" style="height:7%;background:#031122;height:40px;text-align:left; font-size:12px;"  align="center">
		<?= $renderer->component("banner_0") ?>
		</header>
		<nav class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 border-right border-secondary app_parts" style="height:88%;;position:fixed;top:7%;left:0;">
		<?= $renderer->component("menu") ?>
		</nav>
		<div aec-views-container="mainRooter" class="col-xl-10 col-lg-10 col-md-9 col-sm-8 col-8 app_parts" style="height:88%;;position:fixed;top:7%;right:0; overflow-x:hidden; overflow-y:auto;">	
			<?= $body ?? "Aucune vue..."?>							
		</div>
	 	<div class="col-12 app_parts text-right"  style="background:#031122; height:5%;position:fixed; bottom:0; ">
		 	<span style="color:#DDD; font-size: 10px;">
			 Designed and powered by <a href="http://aecorporation.net/" target="_blank">aecorporation</a></span>
		 </div>
	</main>

	<?= $renderer->component("footer") ?>
</body>

</html>