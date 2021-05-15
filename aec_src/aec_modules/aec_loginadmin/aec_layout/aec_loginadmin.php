<!DOCTYPE html>
<html lang="en">
<?= $renderer->component("header") ?>
<body class="bg-light">

	<div class="row">
		<div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12 offset-xl-5 offset-lg-5 offset-ms-4 offset-sm-3 offset-0 alert fixed-top" style="display: none;font-size:12px;box-shadow:2px 2px 5px #444; color:#000; height: 40px; padding: 10px;" align="center" role="alert" id="msg"></div>	
	</div>
	<main class="row">
		<header class="col-12" style="position:fixed; height:7%;z-index:999; border:0px solid red;">
		<?= $renderer->component("banner_0") ?>
		</header>

		<div aec-views-container="mainRooter" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="height:88%;border:0px solid blue;position:fixed;top:7%;right:0; overflow-x:hidden; overflow-y:auto;">
						
			<?= $body ?? "Aucune vue..."?>	

		</div>
	</main>


	<?= $renderer->component("footer") ?>
</body>

</html>