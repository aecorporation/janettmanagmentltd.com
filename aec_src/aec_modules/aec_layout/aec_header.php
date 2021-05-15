<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-block d-md-none div_menu_mobile">
			<div class="row">
				<div class="col-8">
				<i class="fa fa-bars bars_mobile" 
				onClick="showMenuMobileAnimation(this)"
				aria-hidden="true"></i>
				</div>
				<div class="col-4 text-right">
					<img src="<?=$container->get("folder.img")?>logo.png" 
					class="icon_logo_globe mt-2" style="height:35px;"/>
				</div>
			</div>
				
			</div>
		</div>
</div>
<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-block d-md-none div_menu_mobile_">
				<ul class="menu_janett_mobile">
					<?php foreach($container->get("frontFirstLineMenu") as $item): ?>
						<?=$item->menuRender("frontFirstLineMenu")?>	
					<?php endforeach ?></ul>
			</div>
		</div>
</div>
