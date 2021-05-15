
<a title="Voir le profil" class="btn btn-light btn-sm p-1" style="background: transparent; color: #FFF; border:0;" href="<?=$router->generateUri("admin.administrateur.profiladmin", ["action"=>"profiladmin", "code"=> $session["ADMIN_CONNECTED"]->getCode()])?>">
	<img src="<?=$container->get("folder.img.useradmin")?><?=$session["ADMIN_CONNECTED"]->getImage()?>" class="rounded-circle" style="border:2px solid #FFF; height:30px;"/>
		&nbsp;&nbsp;
	<?=$design?>
</a>