<form class="col-12" id="updateServiceclient" action="<?=$router->generateUri("admin.serviceclient.gestion.post.updateServiceclient", ["action"=>"updateServiceclient"])?>">
<div class="row">
<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
<input type="hidden" name="menu" value="<?=$menu?>"/>

                    <div class="col-5 p-4">
                        <div class="row">
                            Apercu d'image
                            <div class="col-12 mt-2"  id="viewsImage" style="background:#EEE; font-family: arial black; min-height:250px;">
                                <?php if(!is_null($module) && $module->image!==null){?>
                                <img src="<?=$container->get("folder.img.site")?><?= !is_null($module) ? $module->image : null?>" style="max-width:100%; auto;"/>
                                <?php } ?>
                            </div>
                            <div class="col-12" style="padding:5px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Fichier</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" onChange="viewAll(this, 'viewsImage')" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                                        <input type="hidden" name="image_" value="<?= isset($module) ? $module->image : null?>"/>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-7 p-4">

                        <div class="row">
                                <div class="col-12" style="padding:5px;">
                                    Titre
                                    <input type="text" name="titre" class="form-control for-check" value="<?= !is_null($module) ? $module->titre : null?>"/>
                                </div>
                                
                                <div class="col-12" style="padding:5px;">
                                    Sous-Titre
                                    <input type="text" name="soustitre" class="form-control" value="<?= !is_null($module) ? $module->soustitre : null?>"/>
                                </div>
                               
                                <div class="col-12" style="padding:5px;">
                                    Détails
                                    <textarea type="text" name="details" id="specialContent" class="form-control for-check specialarea"><?= !is_null($module) ? $module->details : null?></textarea>
                                </div>
                               
                                <div class="col-12" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="updateServiceclient(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                        </div>

                    </div>
</div>

</form>
