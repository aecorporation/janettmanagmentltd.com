<?php if(count($fichiers) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-image fa-5x"></i></br>
                    AUCUN FICHIER
                </h4>
            </div>
<?php return false;}?>

<?php foreach($fichiers as $fichier){?>

<form class="row" id="updateImagevideopub" action="<?=$router->generateUri("admin.imagevideopub.gestion.edit.post.updateImagevideopub", ["action"=>"updateImagevideopub"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
<input type="hidden" name="code_imagevideopub" value="<?=$fichier->getCode_imagevideopub()?>"/>

                    <div class="col-5 p-4">
                        <div class="row">
                            Apercu d'image
                            <div class="col-12 mt-2"  id="viewsImage" style="font-family: arial black; height:250px;">
                                <img src="<?=$container->get("folder.img.imagevideopub")?><?=$fichier->getFichier_imagevideopub()?>" style="max-width: 100%;max-height:100%;"/>
                            </div>
                            <div class="col-12" style="padding:5px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Fichier</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="fichier_imagevideopub" onChange="viewAll(this, 'viewsImage')" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                                    </div>
                                </div>
                            </div>
                               
                               


                        </div>
                    </div>

                    <div class="col-7 p-4">

                        <div class="row">

                                <div class="col-12" style="padding:5px;">
                                    Titre
                                    <input type="text" name="titre_imagevideopub" class="form-control" value="<?=$fichier->getTitre_imagevideopub()?>"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                    Sous-Titre
                                    <input type="text" name="soustitre_imagevideopub" class="form-control"  value="<?=$fichier->getSoustitre_imagevideopub()?>"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Menu
                                <select type="text" name="menu_imagevideopub" class="form-control">
                                        <?php foreach($menus as $k=>$v) {?>
                                            <option value="<?=$k?>" <?php if($k === $fichier->getMenu_imagevideopub()) echo "SELECTED";?>><?=$v?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Position
                                    <input type="number" name="position_imagevideopub"  value="<?=$fichier->getPosition_imagevideopub()?>" class="form-control for-check"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Type
                                    <select type="text" name="type_imagevideopub" class="form-control for-check">
                                        <?php foreach($types as $k=>$v) {?>
                                            <option value="<?=$k?>" <?php if($k === $fichier->getType_imagevideopub()) echo "SELECTED";?>><?=$v?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Etat
                                    <select type="text" name="etat_imagevideopub" class="form-control for-check">
                                        <option value="Active" <?php if("Active" === $fichier->getEtat_imagevideopub()) echo "SELECTED";?>> Active</option>
                                        <option value="Inactive" <?php if("Inactive" === $fichier->getEtat_imagevideopub()) echo "SELECTED";?>> Inctive</option>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Détails
                                    <textarea type="text" name="details_imagevideopub" id="specialContent" class="form-control for-check specialarea"><?=$fichier->getDetails_imagevideopub()?></textarea>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Focus
                                    <select type="text" name="focus_imagevideopub" class="form-control for-check">
                                        <option value="1" <?php if("1" === $fichier->getEtat_imagevideopub()) echo "SELECTED";?>>Selectionné</option>
                                        <option value="0" <?php if("0" === $fichier->getEtat_imagevideopub()) echo "SELECTED";?>>Déselectionné</option>
                                    </select>
                                </div>


                                <div class="col-4" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="updateImagevideopub(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                                <div class="col-4 offset-4" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-danger" onClick="deleteImagevideopub(this)" action="<?=$router->generateUri('admin.imagevideopub.gestion.edit.post.deleteImagevideopub', ["action"=>"deleteImagevideopub", "code"=>$fichier->getCode_imagevideopub()])?>">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </button>
                                </div>
                        </div>

                    </div>
           
</form>

<?php } ?>
