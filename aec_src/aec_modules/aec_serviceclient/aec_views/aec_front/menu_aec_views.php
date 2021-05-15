<?php $menu = $message->{"footer"}->{"menus"}[0];?>


<?php if($option==="frontFirstLineMenu"):?>
	<a  class="aec-menu-bars" href="<?=$router->generateUri("front.serviceclient.contact", ["action"=>"contact"])?>">
		<i class="fa fa-phone"></i> 
		<?=$router->getRoutes()["front.serviceclient.contact"]["description"]?>
	</a>
<?php endif ?>

<?php if($option=== "frontFootMenu"):?>
	<ul class="menu_footer">
		<li class="title mb-3"><?=$menu->title?></li>
		<li><a class="aec-menu-bars" href="<?=$router->generateUri("front.accueil.index")?>"><?=$router->getRoutes()["front.accueil.index"]["description"]?></a></li>
		<li><a class="aec-menu-bars" href="<?=$router->generateUri("front.serviceclient.contact", ["action"=>"contact"])?>"><?=$router->getRoutes()["front.serviceclient.contact"]["description"]?></a></li>
		<li><a class="aec-menu-bars" href="<?=$router->generateUri("front.serviceclient.faq", ["action"=>"faq"])?>"><?=$menu->list[0]->name?></a></li>
		<li><a class="aec-menu-bars" href="<?=$router->generateUri("front.serviceclient.cmd_livraison", ["action"=>"cmd_livraison"])?>"><?=$menu->list[1]->name?></a></li>
		<li><a class="aec-menu-bars" href="<?=$router->generateUri("front.serviceclient.condition_retour_remboursement", ["action"=>"condition_retour_remboursement"])?>"><?=$menu->list[2]->name?></a></li>
	</ul>
<?php endif ?>

<?php if($option=== "frontUnderMenu"){?>
		
				<?php if($_SERVER["REQUEST_URI"]===$router->generateUri("front.serviceclient.contact", ["action"=>"contact"])){?>
					&nbsp;&nbsp;&nbsp;                       
					<a href="<?=$router->generateUri("front.serviceclient.faq", ["action"=>"faq"])?>">
						<?=$router->getRoutes()["front.serviceclient.contact"]["description"]?>	
					</a>
				<?php } ?>
				<?php if($_SERVER["REQUEST_URI"]===$router->generateUri("front.serviceclient.faq", ["action"=>"faq"])){?>
					&nbsp;&nbsp;&nbsp;                       
					<a href="<?=$router->generateUri("front.serviceclient.faq", ["action"=>"faq"])?>">
						<?=$menu->list[0]->name?>	
					</a>
				<?php } ?>
				<?php if($_SERVER["REQUEST_URI"]===$router->generateUri("front.serviceclient.cmd_livraison", ["action"=>"cmd_livraison"])){?>
					&nbsp;&nbsp;&nbsp;                       
					<a href="<?=$router->generateUri("front.serviceclient.cmd_livraison", ["action"=>"cmd_livraison"])?>">
						<?=$menu->list[1]->name?>	
					</a>
				<?php } ?>
				<?php if($_SERVER["REQUEST_URI"]===$router->generateUri("front.serviceclient.condition_retour_remboursement", ["action"=>"condition_retour_remboursement"])){?>
					&nbsp;&nbsp;&nbsp;                       
					<a href="<?=$router->generateUri("front.serviceclient.condition_retour_remboursement", ["action"=>"condition_retour_remboursement"])?>">
						<?=$menu->list[2]->name?>	
					</a>
				<?php } ?>
<?php } ?>