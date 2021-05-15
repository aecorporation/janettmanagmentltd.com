<div class="row mb-2 mt-2">
        <div class="col-1">
            <a title="Liste des membres" data-toggle="tooltip" href="<?=$router->generateUri("admin.administrateur.gestion", ["action"=>"gestion"])?>"  class="btn btn-dark btn-sm btn-block p-1">
                <i class="fa fa-list text-light" style="font-size:18px;"></i>
            </a>
        </div>
        <div class="col-1">
            <a title="Ajouter un membre" data-toggle="tooltip" href="<?=$router->generateUri("admin.administrateur.saveUseradmin", ["action"=>"saveUseradmin"])?>"  class="btn btn-dark btn-sm btn-block p-1">
                <i class="fa fa-save text-light" style="font-size:18px;"></i>
            </a>  
        </div>
</div>

<div class="row" aec-views-container="adminManager">
    <?=$items_views??"Aucune vue"?>
</div>