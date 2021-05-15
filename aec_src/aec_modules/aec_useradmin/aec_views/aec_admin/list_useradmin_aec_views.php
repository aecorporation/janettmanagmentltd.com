<div class="col-12" style="border:0px solid #DDD; min-height:100px; padding:0 20px;" id="listAdmin">

    <form class="row" id="searchUseradmin" method="POST" action="<?=$router->generateUri("admin.administrateur.gestion.post.searchUseradmin", ["action"=>"searchUseradmin"])?>">
    <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

    <div class="col-12" style="border:1px solid #DDD; min-height:100px; padding-top:10px; font-size:12px;">
        <div class="row">
            <div class="col-12">
                 <i class="fa fa-search"></i> <?=$message->admin->body->administration->title_search?>
            </div>
            <div class="col-2">
            <?=$message->admin->body->administration->form_search[0]?>
                <input type="date" name="dateD" class="form-control" onChange="searchUseradmin(this)" style="font-size:12px;"/>
            </div>
            <div class="col-2">
            <?=$message->admin->body->administration->form_search[1]?>
                <input type="date" name="dateA" class="form-control" onChange="searchUseradmin(this)"  style="font-size:12px;"/>
            </div>
            <div class="col-2">
            Pays
                <select name="pays" class="form-control" onChange="searchUseradmin(this)"  style="font-size:12px;">
                    <option></option>
                    <?php foreach($tabs as $tab){ ?>
                        <option value="<?=$tab["pays_useradmin"]?>"><?=$tab["pays_useradmin"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-2">
            Ville
                <select name="ville" class="form-control" onChange="searchUseradmin(this)"  style="font-size:12px;">
                    <option></option>
                    <?php foreach($tabs as $tab){ ?>
                            <option value="<?=$tab["ville_useradmin"]?>"><?=$tab["ville_useradmin"]?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="col-1">
            sexe
            <select name="sexe" class="form-control" onChange="searchUseradmin(this)"  style="font-size:12px;">
                    <option></option>
                    <option value="M">M</option>
                    <option value="F">F</option>
            </select>
            </div>
            <div class="col-3">
            Mot a rechercher
            <input type="text" class="form-control" name="expr" onKeyup="searchUseradmin(this)"/>
            </div>
            

        </div>
    </div>
</form>
<div class="row" id="tableUseradmin" style="margin-top:10px;">

    <?=$tableUseradmin ?? "..."?>

</div>

    


</div>
