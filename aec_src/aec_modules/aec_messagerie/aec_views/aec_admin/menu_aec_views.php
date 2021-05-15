
<a style="cursor:pointer; color:#444;" aec-rooter-view="mainRooter" href="<?=$router->generateUri("admin.messagerie.index")?>">
<span>
		<i class="fa fa-envelope text-light" style="font-size:20px;"></i>

		<b id="countMsg" class="text-center" 
		style="background:red; 
		border:1px solid #FFF; 
		color:#FFF;
		font-size:10px; 
		padding:3px;width:22px;height:22px; 
		border-radius:30px; 
		margin-left:-15px; 
		position:absolute;top:4;
		visibility:<?=($countMsg > 0) ? "visible": "hidden"?>;
		">
			<?=($countMsg <=9) ? "0".$countMsg : $countMsg?>
		</b>
	</span>
</a>
