<form class="row" id="savemenuitems" action="<?=$router->generateUri("admin.menuitems.gestion.save.post.savemenuitems", ["action"=>"savemenuitems"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

                    <div class="col-4 p-4">
                        <div class="row">
                            Apercu d'image
                            <div class="col-12 mt-2"  id="viewsImage" style="background:#DDD; font-family: arial black; height:250px;"></div>
                            <div class="col-12" style="padding:5px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image_menuitems" onChange="viewAll(this, 'viewsImage')" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                                    </div>
                                </div>
                            </div>
                            
                               


                        </div>
                    </div>

                    <div class="col-8 p-4">

                        <div class="row">

                            <div class="col-12" style="padding:5px;">
                                Titre
                                    <input type="text" name="titre_menuitems" class="form-control for-check"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Menu
                                <select type="text" name="menu_menuitems" class="form-control">
                                    <?php foreach($menus as $k=>$v) {?>
                                        <option value="<?=$k?>"><?=$v?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <?php if(count($types) > 0): ?>
                                    <div class="col-12" style="padding:5px;">
                                    Type
                                        <select type="text" name="type_menuitems" class="form-control for-check">
                                            <?php foreach($types as $k=>$v) {?>
                                                <option value="<?=$k?>"><?=$v?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php endif ?>

                                <div class="col-12" style="padding:5px;">
                                Détails
                                    <textarea type="text" name="details_menuitems" id="specialContent" class="form-control for-check specialarea"></textarea>
                                </div>


                                <div class="col-12" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="saveMenuitems(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                        </div>

                    </div>
           
</form>
