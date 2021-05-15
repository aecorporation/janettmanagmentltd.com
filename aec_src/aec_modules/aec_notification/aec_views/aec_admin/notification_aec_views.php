<div class="row">
	<div class="col-12 bg-light" id="notifContainer" style="width: 470px; height:100%; position:fixed; top:0; right:0;display:block; transform:translateX(100%); z-index:99999999999;">

		<div class="row bg-light text-dark p-1"  style="height:40px;font-family:arial; font-size:14px;">
			<span class="col-11">
				<i class="fa fa-bell"></i> Notifications
			</span>
			<span class="col-1">
				<i class="fa fa-times float-right" onClick="closeContent()" style="font-size:25px; cursor:pointer;"></i>
			</span>
		</div>
		
		<form class="row" id="searchNotification" action="<?=$router->generateUri("admin.notification.index.post.searchNotification", ["action"=>"searchNotification"])?>">

				<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

			<div class="col-12" style="border:1px solid #DDD; min-height:100px;font-size:12px;">
				<div class="row">
					<div class="col-12">
						<i class="fa fa-search"></i> <?=$message->admin->body->notification->title_search?>
					</div>
					<div class="col-6" style="padding:5px;">
					<?=$message->admin->body->notification->form_search[0]?>
						<input type="date" name="dateD" class="form-control" onchange="searchNotification()" onkeyup="searchNotification()"/>
					</div>
					<div class="col-6" style="padding:5px;">
					<?=$message->admin->body->notification->form_search[1]?>
						<input type="date" name="dateA" class="form-control" onchange="searchNotification()" onkeyup="searchNotification()"/>
					</div>
				</div>
			</div>
		</form>

		<div class="row" id="list_notification" aec-views-container="notification" style="padding:0 10px;height:74%; background:transparent; overflow-x:hidden; overflow-y:auto; padding-bottom:20px;">
			<?=$list_notification ?? "Aucune vue..." ?>
		</div>
	</div>
</div>