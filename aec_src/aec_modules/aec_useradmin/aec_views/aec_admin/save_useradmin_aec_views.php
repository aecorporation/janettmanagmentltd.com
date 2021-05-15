<div class="col-12" id="saveAdmin" style="border:0px solid #DDD; min-height:100px;">

        <div class="row">

        <?php if(isset($user)){?>
            <?php if($user!==null){?>

                <aside class="col-12 p-0" align="right">

                    <a data-toggle="tooltip" title="Actualiser" href="<?=$router->generateUri("admin.administrateur.visualiseradmin", ["action"=>"visualiseradmin", "code"=>$user->getCode_useradmin()])?>">
                        <i class="fa fa-sync-alt mr-3 text-dark" data-toggle="tooltip"style="font-size:18px;cursor:pointer;"></i>
                    </a>

                    <a target="_blank" href="<?=$container->get("folder.img")?>useradmin/<?=$user->getPiece_useradmin()?>"> 
                        <i class="fa fa-file mr-3 text-dark" data-toggle="tooltip" title="Voir Pièce d'identité" style="font-size:18px;cursor:pointer;"></i>
                    </a>

                    <i class="fa fa-save mr-3 text-dark" onClick="updateUseradmin(this)" data-toggle="tooltip" title="Enregistrer les modifications" style="font-size:18px;cursor:pointer;"></i>

                    <?php if($optionAction === "visualiseradmin"){?>
                    <i onClick="deleteUseradmin(this)"  data-toggle="tooltip" title="Supprimer l'administrateur" style="font-size:18px;cursor:pointer;"  action="<?=$router->generateUri("admin.administrateur.gestion.post.deleteUseradmin", ["action"=>"deleteUseradmin"])?>" class="fa fa-trash"></i> 
                    <?php } ?>

                </aside>
            

                <?php }else{ ?>
                    
                    <div class="col-12 mt-5" align="center">
                        <h4 class="text-dark">
                            <i class="fa fa-user-tie fa-5x"></i></br>
                            AUCUN ADMINISTRATEUR
                        </h4>
                    </div>
                <?php return; ?>
                <?php } ?>
        <?php } ?>

        <?php if(isset($user)){?>
        <form class="col-12" id="updateUseradmin" method="POST" action="<?=$router->generateUri("admin.administrateur.gestion.post.updateUseradmin", ["action"=>"updateUseradmin"])?>">
       
        <input type="hidden" name="code_useradmin" value="<?=$user->getCode_useradmin()?>"/>
        
        <aside class="col-2 p-1" align="left">
            <?php if($optionAction === "visualiseradmin"){?>
                <input type="radio" name="etat_useradmin" value="0" <?php if($user->getEtat_useradmin()=== 0) echo "checked"; ?>/> Désactivé &nbsp;&nbsp;&nbsp;
                <input type="radio" name="etat_useradmin" value="1" <?php if($user->getEtat_useradmin()=== 1) echo "checked"; ?>/> Activé
            <?php } ?>

        </aside>

        <?php }else{?>
            <form class="col-12" id="saveUseradmin" method="POST" action="<?=$router->generateUri("admin.administrateur.gestion.post.saveUseradmin", ["action"=>"saveUseradmin"])?>">
        <?php }?>

        <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

        <div class="row">

            <div class="col-4">

                <div class="row">

                        <div class="col-12" style="padding:5px;">
                                
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image_useradmin" onChange="viewAll(this, 'viewsImage')" class="custom-file-input <?php if(!isset($user)) echo "for-check";?>" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-4 p-0" align="center" id="viewsImage" style="height:180px;">
                        <?php if(isset($user)){?>
                                <img src="<?=$container->get("folder.img.useradmin")?><?=$user->getImage_useradmin()?>" style="height:150px; width:auto;"/>
                        <?php }else{?>
                            <i class="fa fa-user-tie fa-10x"></i>
                        <?php }?>
                        </div>

                        <div class="col-12" style="padding:5px;">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon02" style="font-size:12px;">Pièce d'identité</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="piece_useradmin" class="custom-file-input <?php if(!isset($user)) echo "for-check";?>" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choisir le fichier</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-12" style="padding:5px;">
                        Numeéro de pièce
                            <input type="text" class="form-control for-check" name="numpiece_useradmin" value="<?=isset($user)?$user->getNumpiece_useradmin():""?>"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Nom
                            <input type="text" class="form-control for-check" name="nom_useradmin" value="<?=isset($user)?$user->getNom_useradmin():""?>"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Prénoms
                            <input type="text" class="form-control for-check" name="prenoms_useradmin" value="<?=isset($user)?$user->getPrenoms_useradmin():""?>"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Date de naissance
                            <input type="date" class="form-control for-check" name="dateNais_useradmin" value="<?=isset($user)?$user->getDateNais_useradmin():""?>"/>
                        </div>


                </div>

            </div>

            <div class="col-4">

                <div class="row">

            
                        <div class="col-12" style="padding:5px;">
                        Lieu de naissance
                            <input type="text" class="form-control for-check" name="lieuNais_useradmin"  value="<?=isset($user)?$user->getLieuNais_useradmin():""?>"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Sexe
                        <select class="form-control for-check" name="sexe_useradmin">
                                <option value="">Sectionnez</option>
                                <option value="M" <?= isset($user)? (($user->getSexe_useradmin() === "M") ? "SELECTED": ""):""?>>Homme</option>
                                <option value="F"  <?=isset($user)? (($user->getSexe_useradmin() === "F") ? "SELECTED": ""):""?>>Femme</option>
                            </select>
                        </div>

            
                        <div class="col-12" style="padding:5px;">
                            Situation matrimoniale
                            <select class="form-control for-check" name="sitMatr_useradmin">
                                <option value="">Sectionnez</option>
                                <option <?= isset($user)?(($user->getSitMatr_useradmin() === "Célibataire") ? "SELECTED": ""):""?>>Célibataire</option>
                                <option <?= isset($user)?(($user->getSitMatr_useradmin() === "Marié(e)") ? "SELECTED": ""):""?>>Marié(e)</option>
                                <option <?= isset($user)?(($user->getSitMatr_useradmin() === "Veuf(ve)") ? "SELECTED": ""):""?>>Veuf(ve)</option>
                            </select>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Nombre enfant(s)
                            <input type="number" min="0" max="20" class="form-control for-check" name="nbenf_useradmin"  value="<?=isset($user)?$user->getNbenf_useradmin():""?>"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Contacts
                            <input type="text" class="form-control for-check" name="contact_useradmin" value="<?=isset($user)?$user->getContact_useradmin():""?>"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        E-mail
                            <input type="email" class="form-control for-check" name="email_useradmin" value="<?=isset($user)?$user->getEmail_useradmin():""?>"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Adresse
                            <input type="text" class="form-control" name="adresse_useradmin" value="<?=isset($user)?$user->getAdresse_useradmin():""?>"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Boite postal
                            <input type="text" class="form-control" name="bp_useradmin" value="<?=isset($user)?$user->getBp_useradmin():""?>"/>
                        </div>
                </div>

            </div>

        
            <div class="col-4">

                <div class="row">


                        <div class="col-12" style="padding:5px;">
                        Pays
                        <select class="form-control for-check" name="pays_useradmin">
                            <option value="">Sectionnez</option>
                            <?php foreach($countries as $k => $v){ ?>
                                <?php if(isset($user)){ ?>
                                    <option <?= ($user->getPays_useradmin() === $v) ? "SELECTED": ""?> value="<?=$v?>"><?=$v?></option>
                                <?php }else{?>
                                    <option value="<?=$v?>" <?php if($k==="Cote d'Ivoire") echo "SELECTED"; ?>><?=$v?></option>
                                <?php }?>
                            <?php } ?>
                        </select>
                        </div>
                    
                        <div class="col-12" style="padding:5px;">
                        Ville
                            <input type="text" class="form-control for-check" name="ville_useradmin" value="<?=isset($user)?$user->getVille_useradmin():""?>"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Quartier
                            <input type="text" class="form-control for-check" name="quartier_useradmin" value="<?=isset($user)?$user->getQuartier_useradmin():""?>"/>
                        </div>
            
                        <div class="col-12" style="padding:5px;">
                        Login
                            <input type="text" class="form-control for-check" name="login_useradmin"  value="<?=isset($user)?$user->getLogin_useradmin():""?>"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Mot de passe
                            <input type="<?php if($optionAction === "gestion") echo"password"; else echo "text";?>" class="form-control for-check" name="mdp_useradmin"  value="<?=isset($user)?$user->getMdp_useradmin():""?>"/>
                        </div>

                        <?php if(!isset($user)){ ?>

                        <div class="col-12" style="padding:5px;">
                        Repeter Mot de passe
                            <input type="password" class="form-control for-check" name="mdp_repeat"/>
                        </div>
                        
                        <?php } ?>

                        <div class="col-12" style="padding:5px;">
                        Privilege

                        <?php if($optionAction !== "profiladmin"){?>

                            <select class="form-control for-check" name="codePrivilege_useradmin">
                                <option value="">Sectionnez</option>
                                <?php foreach($privileges as $privilege){ ?>
                                    <option <?=isset($user)? (($user->getCodePrivilege_useradmin() === $privilege->getCode_privilege()) ? "SELECTED": ""):""?> value="<?=$privilege->getCode_privilege()?>"> <?=$privilege->getNom_privilege()?></option>
                                <?php } ?>
                            </select>

                        <?php }else{ ?>
                            
                                <?php if(isset($user)){ ?>
                                    <?php foreach($privileges as $privilege){ ?>
                                        <?php if($user->getCodePrivilege_useradmin() === $privilege->getCode_privilege()){ ?>
                                            <input type="text" value="<?=$privilege->getNom_privilege()?>" class="form-control" disabled/>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>

                        <?php } ?>

                        </div>

                        <?php if(!isset($user)){ ?>
                            
                            <div class="col-12" style="padding:5px;">
                                </br>
                                <button type="button" class="btn btn-light btn-sm btn-block"  onClick="saveUseradmin(this)">
                                    <i class="fa fa-save" style="font-size:20px; cursor:pointer;"></i> Enrégistrer
                                </button>
                            </div>
                        <?php } ?>

                </div>

            </div>

        </div>

                <?php if(isset($user)){ ?>

                    <div class="row">

                        <div class="col-6">

                        

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

                                <?php foreach($user->getHistories() as $history){?>
                                    <div class="col-12 p-2">
                                        <i class="fa fa-circle"></i> <?=$history->libele_historique?> : <?=$history->date_at_historique?> par : 
                                        <?= !is_null($history) ? $history->nom_useradmin : ""?> <?= !is_null($history) ?$history->prenoms_useradmin : ""?>
                                    </div>
                                <?php }?>

                                </div>
                                    
                                </aside>

                                </div>

                            </div>

                        </div>



                        </div>

                        </div>



                        <div class="col-6">

                            <div class="accordion col-12 p-0" id="accordionExample">

                                <div class="card">

                                    <div class="card-header" id="headingThree">

                                        <h2 class="mb-0">
                                            <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <i class="fa fa-table"></i> MENUS ET ACTIONS
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
                    </div>

                    

                <?php } ?>

        </form>





    </div>

</div>