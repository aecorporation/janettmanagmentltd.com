<form class="col-12" id="updateServiceclient" action="<?=$router->generateUri("admin.serviceclient.gestion.post.updateServiceclient", ["action"=>"updateServiceclient"])?>">
<div class="row">
    <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
    <input type="hidden" name="menu" value="<?=$menu?>"/>

        <div class="col-6" style="border:0px solid #DDD; min-height:100px; padding:0 20px 0 20px;">
            <div class="row">
            <div class="col-12" style="font-family: arial; padding:5px;">
                <?=$message->admin->body->site->contact->titles[1]?>
            </div>
            <div class="col-12" style="background:#DDD; font-family: arial black; padding:5px; height:270px; margin-top:20px; margin-bottom:20px;">
                <?php if(!is_null($module) && $module->localisation!==null){?>
                    <iframe src="<?= !is_null($module) ? $module->localisation : null?>" style="width:100%; height:100%;"></iframe>
                <?php } ?>
            </div>
            Lien google map
            <input type="text" name="localisation" class="form-control for-check" value="<?= !is_null($module) ? $module->localisation : null?>"/>
        </div>

        </div>
        <div class="col-6" style="border:0px solid #DDD; min-height:100px; padding:0 20px 0 20px;">
        <div class="row">
            <div class="col-12" style="font-family: arial; padding:5px;">
                Details info : 
                <textarea name="details" class="for-check specialarea" id="specialContent"><?= !is_null($module) ? $module->details : null?></textarea>
            </div>
        </div>
                
        <div class="row">
            <div class="col-12" style="padding:5px;">
                <button type="button" class="btn btn-sm btn-block btn-dark" onClick="updateServiceclient(this)"> 
                    <i class="fa fa-save"></i> <?=$message->admin->body->site->contact->btn?>
                </button>
            </div>
        </div>
        </div>
       

</div>
</form>