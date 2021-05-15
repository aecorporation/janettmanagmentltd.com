
<!-- VISUALISER UN PRIVILEGE-->

<?php if(isset($privilege) && $privilege !==null){?>
    
<form method="POST" id="updatePrivilege" action="<?=$router->generateUri("admin.administrateur.createPrivilege.post.updatePrivilege", ["action"=>"updatePrivilege"])?>" class="col-12">
        
    <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

    <input type="hidden" name="code_privilege" value="<?=$privilege->getCode_privilege()?>"/>

    <div class="row" style="margin-top:10px;">
                

            <div class="col-12" align="right">

                <i class="fa fa-save  mr-4" title="Sauvegarder les modifications" style="font-size:18px; cursor:pointer;" onClick="updatePrivilege(this)"></i>

                <i class="fa fa-trash" title="Supprimer le privilège" style="font-size:18px; cursor:pointer;" onClick="deletePrivilege(this)" id="<?=$privilege->getCode_privilege()?>" action="<?=$router->generateUri("admin.administrateur.createPrivilege.post.deletePrivilege", ["action"=>"deletePrivilege", "code"=>$privilege->getCode_privilege()])?>" ></i> 


            </div>
                


            <div class="col-12" style="padding:10px;overflow-x: hidden; overflow-y:auto;">
                Nom du Privilege
                <input name="nom_privilege" class="form-control for-check" value="<?=$privilege->getNom_privilege()?>"/">
            </div>

            <div class="col-12" style="padding:10px;overflow-x: hidden; overflow-y:auto;">
                Details
                <textarea name="details_privilege" class="form-control for-check" rows="3"><?=$privilege->getDetails_privilege()?></textarea>
            </div>


            <div class="accordion col-12 p-0" id="historik">

                        <div class="card">

                            <div class="card-header" id="headingThree">

                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menus_" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-history"></i> MENUS ET ACTIONS
                                    </button>
                                </h2>

                            </div>

                            <div id="menus_" class="collapse" aria-labelledby="headingThree" data-parent="#historik">

                                <div class="card-body">

                                <aside class="col-12 mb-5 bg-light">

                                <div class="row">

                                <?=$listeMenusActions ?? "..."?>


                                </div>
                                    
                                </aside>

                                </div>

                            </div>

                        </div>

            </div>

            
            <div class="accordion col-12 p-0" id="historik">

                        <div class="card">

                            <div class="card-header" id="headingThree">

                                <h2 class="mb-0">
                                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#historik_" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-history"></i> HISTORIQUES
                                    </button>
                                </h2>

                            </div>

                            <div id="historik_" class="collapse" aria-labelledby="headingThree" data-parent="#historik">

                                <div class="card-body">

                                <aside class="col-12 mb-5 bg-light">

                                <div class="row">

                                <?php foreach($privilege->getHistories() as $history){?>
                                    <div class="col-12 p-2">
                                        <i class="fa fa-circle"></i> <?=$history->libele_historique?> : <?=$history->date_at_historique?> par : 
                                        <?= !is_null($history->nom_useradmin) ? $history->nom_useradmin : ""?> <?= !is_null($history->prenoms_useradmin) ? $history->prenoms_useradmin : ""?>
                                    </div>
                                <?php }?>

                                </div>
                                    
                                </aside>

                                </div>

                            </div>

                        </div>

            </div>

        
    
        </div>

    </div>

</form>

    <?php }else{ ?>
        
        <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-table fa-5x"></i></br>
                    AUCUN PRIVILEGE
                </h4>
            </div>

    <?php }?>