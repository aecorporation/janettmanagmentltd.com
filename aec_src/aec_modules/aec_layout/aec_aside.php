

						<div class="row" style="height:10px;"></div>
						<div class="row aec-reveal" aec-delay="0.1">
							<div style="background:transparent;min-height:50px;" 
							class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 
							col-md-10 offset-md-1 col-sm-10 
							offset-sm-1 col-10 p-2">
								<img src="<?=$container->get("folder.img")?>logo.png" class="icon_logo_globe"/>
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal" aec-delay="0.2">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<span class="lang">
								<a href="#" onclick="doGTranslate('fr|fr');return false;" title="Francais">
								FR
								</a>
								&nbsp;/ &nbsp; 
								<a href="#" onclick="doGTranslate('fr|en');return false;" title="English">
								EN
								</a>
								</span>
							</div>
						</div>
						<div class="row" style="height:20px;"></div>
						<div class="row aec-reveal" aec-delay="0.3">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<ul class="menu_janett aec-reveal" aec-delay="0.4">
									<?php foreach($container->get("frontFirstLineMenu") as $item): ?>
										<?=$item->menuRender("frontFirstLineMenu")?>	
									<?php endforeach ?>
								</ul>
							</div>
						</div>
						<div class="row aec-reveal" aec-delay="0.85">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<hr class="menu" />
							</div>
						</div>
						<div class="row aec-reveal" aec-delay="0.9" style="position:absolute; bottom:0; left:0; right: 0;">
							<div style=" display: inline-block; vertical-align: bottom;" 
							class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
								<span class="copyright">&copy; 2021 JANETT MANAGEMENT LTD - TOUS DROITS RÉSERVÉS </span>
							</div>
						</div>
				



