		<?php if(count($notifications) <= 0){?>
			<div class="col-12 mt-5" align="center">
						<h4 class="text-dark">
							<i class="fa fa-bell-slash fa-5x"></i></br>
							AUCUNE NOTIFICATAION
						</h4>
					</div>
		<?php return false;}?>
		
		<span class="col-12"><i class="fa fa-cogs"></i> Résultat : <?= count($notifications)?></span>
		<span class="col-12">
			<span class="row">
				<div class="col-12" style="padding-top:10px; height:90%; overflow:auto;">
				
					<?php foreach($notifications as $notification):?>
	
					<div class="row mt-2"  style="background:<?=($notification->getDateview_notification() === NULL) ?"#DDD" : "#eee"?>; color:#000;border-radius:10px; min-height:100px; padding:10px;text-align:justify; font-family:arial; font-size:12px;">
						<span class="col-12">
							<?=$notification->getContenu_notification()?>
						</span>

							<span class="col-6" style="text-align:left;">

							<?php if($notification->getObjetconcerne_notification() !== null ):?>

								<a class="btn btn-<?=($notification->getDateview_notification() === NULL) ?"dark" : "secondary"?> btn-sm pt-0 pb-0 pl-1 pr-1" 
								href="
								<?php if($notification->getType_of_notification() === "Commande") : ?>
									<?=$router->generateUri("admin.commandes.gestion_commandes.editer_commandes", 
									["action"=>"editer_commandes", "code"=>$notification->getObjetconcerne_notification()])?>"
								<?php endif ?>

								>
								<i class="fa fa-eye"></i> Voir</a>

								<?php endif ?>

							</span>


						<span class="col-6" style="text-align:right;"><?=$notification->getDate_at_notification()?></span>
					</div>

					<?php endforeach ?>

				</div>
			</span>
		</span>