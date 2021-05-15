
<div class="row">
		<div id = "profilInfo" class="col-xl-8 col-lg-7 col-8 pl-4 text-light">
		
		<?php if(isset($session["ADMIN_CONNECTED"])){?>

			<a title="Voir le profil" class="btn btn-light btn-sm p-1" style="background: transparent; color: #FFF; border:0;" href="<?=$router->generateUri("admin.administrateur.profiladmin", ["action"=>"profiladmin", "code"=> $session["ADMIN_CONNECTED"]->getCode_useradmin()])?>">
				<img src="<?=$container->get("folder.img.useradmin")?><?=$session["ADMIN_CONNECTED"]->getImage_useradmin()?>" class="rounded-circle" style="border:2px solid #FFF; height:30px;"/>
				&nbsp;&nbsp;
				<?=$session["ADMIN_CONNECTED"]->getNom_useradmin()." ".$session["ADMIN_CONNECTED"]->getPrenoms_useradmin()?>
			</a>

		<?php } ?>

		</div>
		
		<div class="col-xl-3 col-lg-2 col-4 text-right pt-2 text-light" align="center">
			<button class="btn bg-ligth btn-sm" onClick="history.go(-1)" style="color:#333; cursor:pointer;" data-toggle="tooltip" title="Retour">
                    <i class="fa fa-reply text-light" style="font-size:18px;cursor:pointer;"></i>
            </button>
			<?php if(isset($container)){?>
				<?php foreach($container->get("widgetAdminMsg") as $item){?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?=$item->menuRender("")?>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="col-xl-1 col-lg-1 col-1 pt-2 text-light" align="right">
		<form id="disconnectUseradmin" method="POST" action="<?=$router->generateUri("admin.administrateur.gestion.post.disconnectUseradmin", ["action"=>"disconnectUseradmin"])?>">
			<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>				
			<i class="fa fa-power-off fa-2x" style="cursor:pointer;"  data-toggle="tooltip" title="Déconnexion" onClick="disconnectUseradmin(this)" ></i>
		</form>
		</div>
	</div>