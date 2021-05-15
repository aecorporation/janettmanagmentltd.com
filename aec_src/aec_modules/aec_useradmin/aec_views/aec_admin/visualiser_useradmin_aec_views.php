<div class="col-12" id="saveAdmin" style="border:0px solid #DDD; min-height:100px; padding:0 20px;">

        <div class="row">

        <div class="col-10 p-2" style="background:#DDD; font-family: arial black;">
            <i class="fa fa-database"></i> Enregistrement des membres d'administration
        </div>
        <div class="col-2" style="background:#DDD; font-family: arial black; padding:5px;">
            <a href="<?=$router->generateUri("admin.administrateur.gestion", ["action"=>"gestion"])?>" style="width:200px;" class="btn btn-info btn-sm p-1 float-right"> 
                <i class="fa fa-list"></i> Liste des membres
            </a>
        </div>

        <form class="col-12" id="saveUseradmin" method="POST" action="<?=$router->generateUri("admin.administrateur.gestion.post.saveUseradmin", ["action"=>"saveUseradmin"])?>">

        <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

        <div class="row">

            <div class="col-4">

                <div class="row">

                        <div class="col-4 p-3 text-center" id="viewsImage" style="height:180px;">
                            <i class="fa fa-image fa-10x"></i>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" onChange="viewAll(this, 'viewsImage')" class="custom-file-input for-check" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                        </div>
                        </div>

                        </div>

                        <div class="col-12" style="padding:5px;">
                        Nom
                            <input type="text" class="form-control for-check" name="nom"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Prénoms
                            <input type="text" class="form-control for-check" name="prenoms"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Date de naissance
                            <input type="date" class="form-control for-check" name="dateNais"/>
                        </div>


                </div>

            </div>

            <div class="col-4">

                <div class="row">

            
                        <div class="col-12" style="padding:5px;">
                        Lieu de naissance
                            <input type="text" class="form-control for-check" name="lieuNais"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Sexe
                        <select class="form-control for-check" name="sexe">
                                <option value="">Sectionnez</option>
                                <option value="M">Homme</option>
                                <option value="F">Femme</option>
                            </select>
                        </div>

            
                        <div class="col-12" style="padding:5px;">
                            Situation matrimoniale
                            <select class="form-control for-check" name="sitMatr">
                                <option value="">Sectionnez</option>
                                <option>Célibataire</option>
                                <option>Marié(e)</option>
                                <option>Veuf(ve)</option>
                            </select>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Contacts
                            <input type="text" class="form-control for-check" name="contact"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        E-mail
                            <input type="email" class="form-control for-check" name="email"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Adresse
                            <input type="text" class="form-control for-check" name="adresse"/>
                        </div>
                </div>

            </div>

        
            <div class="col-4">

                <div class="row">


                        <div class="col-12" style="padding:5px;">
                        Pays
                        <select class="form-control for-check" name="pays">
                            <option value="">Sectionnez</option>
                            <?php foreach($countries as $k => $v){ ?>
                                <option value="<?=$v?>" <?php if($k==="Cote d'Ivoire") echo "SELECTED"; ?>><?=$v?></option>
                            <?php } ?>
                        </select>
                        </div>
                    
                        <div class="col-12" style="padding:5px;">
                        Ville
                            <input type="text" class="form-control for-check" name="ville"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Quartier
                            <input type="text" class="form-control for-check" name="quartier"/>
                        </div>
            
                        <div class="col-12" style="padding:5px;">
                        Login
                            <input type="text" class="form-control for-check" name="login"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Mot de passe
                            <input type="password" class="form-control for-check" name="mdp"/>
                        </div>
                        <div class="col-12" style="padding:5px;">
                        Repeter Mot de passe
                            <input type="password" class="form-control for-check" name="mdp_repeat"/>
                        </div>

                        <div class="col-12" style="padding:5px;">
                        Privilege
                            <select class="form-control for-check" name="codeprivilege">
                                <option value="">Sectionnez</option>
                                <?php foreach($privileges as $privilege){ ?>
                                    <option value="<?=$privilege->getCode()?>"> <?=$privilege->getNom()?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 mt-2" style="padding:5px;">
                            <button type="button" onClick="saveUseradmin(this)" class="btn btn-block btn-sm" style="background:#ff0071;color:#FFF;"> 
                                <i class="fa fa-save"></i> <?=$message->admin->body->administration->btn?>
                            </button>
                        </div>

                </div>

            </div>

        </div>

        </form>





    </div>

</div>