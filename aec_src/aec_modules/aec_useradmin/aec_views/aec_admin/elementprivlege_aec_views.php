<div class="row mb-2 mt-2">
        <div class="col-1">
            <a title="Liste des membres" data-toggle="tooltip" href="<?=$router->generateUri("admin.administrateur.createPrivilege", ["action"=>"createPrivilege"])?>"  class="btn btn-dark btn-sm btn-block p-1">
                <i class="fa fa-list text-light" style="font-size:18px;"></i>
            </a>
        </div>
        <div class="col-1">
            <button title="Créer un privilège"  data-toggle="modal" data-target="#showForm" href="<?=$router->generateUri("admin.administrateur.saveUseradmin", ["action"=>"saveUseradmin"])?>"  class="btn btn-dark btn-sm btn-block p-1">
                <i class="fa fa-save text-light" style="font-size:18px;"></i>
            </button>  
        </div>

</div>

<div class="row" aec-views-container="adminManager">
    <?=$items_views??"Aucune vue"?>
</div>