
<!--FORMULAIRE ENREGISTREMENT DE PRIVILEGE-->


<form method="POST" id="savePrivilege" action="<?=$router->generateUri("admin.administrateur.createPrivilege.post.savePrivilege", ["action"=>"savePrivilege"])?>" class="col-12" style="padding: 0 20px;">
    
        <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

        <div class="row" style="margin-top:10px;">

        <div class="col-12 mb-2" style="padding:5px;">
            <button style="width:200px;" type="button" class="btn btn-light btn-sm btn-sm float-right" onClick="savePrivilege()">
                <i class="fa fa-save"></i> <?=$message->admin->body->administration->btn?>
            </button>
        </div>

        <div class="col-12" style="border:1px solid #DDD; min-height:100px; font-size:12px;">

                <div class="row">
                    <div class="col-12" style="padding:5px;">
                    Désignation
                        <input type="text" name="nom_privilege" class="form-control for-check"/>
                    </div>
                    <div class="col-12" style="padding:5px;">
                    Privilege parent
                        <select type="text" name="parent_privilege" class="form-control for-check">
                            <option>ADMINISTRATEUR</option>
                        </select>
                    </div>
                    <div class="col-12" style="padding:5px;">
                    Détails
                        <textarea name="details_privilege" rows="10" class="form-control for-check"></textarea>
                    </div>
                    
                </div>
                
        </div>

        <div class="accordion col-12 p-0" id="accordionExample">

                <div class="card">

                        <div class="card-header" id="headingThree">

                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-table"></i> Joindre des menus et des actions
                                </button>
                            </h2>

                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">

                            <div class="card-body">

                                <?= $listeMenusActions ?? "..."?>

                            </div>

                        </div>

                </div>

            </div>

        </div>

</form>