

<?php if($option==="frontFirstLineMenu"):?>
	
	<li><a  aec-router="<?=$router->generateUri("front.accueil.index")?>" class="aec-reveal" aec-delay="0.5"><?= $router->getRoutes()["front.accueil.index"]["description"] ?></a></li>
	<li><a  aec-router="<?=$router->generateUri("front.accueil.mission_et_vision")?>" class="aec-reveal" aec-delay="0.6"><?= $router->getRoutes()["front.accueil.mission_et_vision"]["description"] ?></a></li>
	<li><a  aec-router="<?=$router->generateUri("front.accueil.nos_services")?>" class="aec-reveal" aec-delay="0.7"><?= $router->getRoutes()["front.accueil.nos_services"]["description"] ?></a></li>
	<li><a  aec-router="<?=$router->generateUri("front.accueil.nos_contacts")?>" class="aec-reveal" aec-delay="0.8"><?= $router->getRoutes()["front.accueil.nos_contacts"]["description"] ?></a></li>
	
<?php endif ?>

							

