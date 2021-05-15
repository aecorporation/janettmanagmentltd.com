<span style="cursor:pointer;"  onClick="showContent(this)" 
action="<?=$router->generateUri("admin.notification.index")?>">
	<i class="fa fa-shopping-cart" style="font-size:20px;"></i>

	<b id="countNotify" class="text-center" 
		style="background:red; 
		border:1px solid #FFF; 
		color:#FFF;
		font-size:10px; 
		padding:3px;width:22px;height:22px; 
		border-radius:30px; 
		margin-left:-15px; 
		position:absolute;top:4;
		visibility:<?=($countNotify > 0) ? "visible": "hidden"?>;
		">
			<?=($countNotify <=9) ? "0".$countNotify : $countNotify?>
		</b>
</span>