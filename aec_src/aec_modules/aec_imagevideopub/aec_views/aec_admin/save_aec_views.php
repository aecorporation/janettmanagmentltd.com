<form class="row" id="saveImagevideopub" action="<?=$router->generateUri("admin.imagevideopub.gestion.save.post.saveImagevideopub", ["action"=>"saveImagevideopub"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

                    <div class="col-5 p-4">
                        <div class="row">
                            Apercu d'image
                            <div class="col-12 mt-2"  id="viewsImage" style="background:#DDD; font-family: arial black; height:250px;"></div>
                            <div class="col-12" style="padding:5px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Fichier</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="fichier_imagevideopub" onChange="viewAll(this, 'viewsImage')" class="custom-file-input for-check" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
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
                                    <input type="text" name="titre_imagevideopub" class="form-control for-check"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                    Sous-Titre
                                    <input type="text" name="soustitre_imagevideopub" class="form-control"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                    Menu
                                <select type="text" name="menu_imagevideopub" class="form-control">
                                    <?php foreach($menus as $k=>$v) {?>
                                        <option value="<?=$k?>"><?=$v?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Position
                                    <input type="number" value="1" name="position_imagevideopub" class="form-control for-check"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Type
                                    <select type="text" name="type_imagevideopub" class="form-control for-check">
                                        <?php foreach($types as $k=>$v) {?>
                                            <option value="<?=$k?>"><?=$v?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Etat
                                    <select type="text" name="etat_imagevideopub" class="form-control for-check">
                                        <option value="Active"> Active</option>
                                        <option value="Inactive"> Inctive</option>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Focus
                                    <select type="text" name="focus_imagevideopub" class="form-control for-check">
                                        <option value="1">Selectionné</option>
                                        <option value="0">Déselectionné</option>
                                    </select>
                                </div>
                                
                                <div class="col-12" style="padding:5px;">
                                Détails
                                    <textarea type="text" name="details_imagevideopub" id="specialContent" class="form-control for-check specialarea"></textarea>
                                </div>

                                <div class="col-12" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="saveImagevideopub(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                        </div>

                    </div>

           
</form>
