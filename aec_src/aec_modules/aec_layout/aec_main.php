<!DOCTYPE html>
<html>
<?= $renderer->component("head") ?>

<body>
	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 offset-xl-5 offset-lg-5 offset-ms-4 offset-sm-3 offset-0 alert fixed-top p-0" 
		style="z-index:9999999; display: none;font-size:12px;box-shadow:2px 2px 5px #444; color:#000; height: 40px;" align="center" role="alert" id="msg"></div>	
	</div>

	<div class="container-fluid aec-container-main" style="border: 0px solid red;">

		<header class="d-block d-md-none fixed-top">
			<?= $renderer->component("header") ?>
		</header>
		<aside align="center" class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12 d-none d-md-block div_menu_janett">
			<div  style="position: relative; height: 98%;">
				<?= $renderer->component("aside") ?>
			</div>
		</aside>
		<main id="body" class="content_page_global col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12" 
		style="border:0px solid red; background-color: rgba(3, 17, 34,1); ">
			<?= $body ?? "Aucune vue..." ?>
		</main>
		<footer class="row aec-footer"><?= $renderer->component("footer") ?></footer>

	</div>
	
	<div style="clear: both"></div>

	<?= $renderer->component("foot") ?>

</body>
</html>