<?php if(count($menuitems) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-image fa-5x"></i></br>
                    AUCUN menuitem
                </h4>
            </div>
<?php return false;}?>

<?php foreach($menuitems as $menuitem):?>

<form class="row" id="updatemenuitems" action="<?=$router->generateUri("admin.menuitems.gestion.edit.post.updatemenuitems", ["action"=>"updatemenuitems"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
<input type="hidden" name="code_menuitems" value="<?=$menuitem->getCode_menuitems()?>"/>

                    <div class="col-4 p-4">
                        <div class="row">
                            Apercu d'image
                            <div class="col-12 mt-2 text-center"  id="viewsImage" style="font-family: arial black; height:250px;">
                                <?php if($menuitem->getImage_menuitems() != null):?>
                                    <img src="<?=$container->get("folder.img.menuitems")?><?=$menuitem->getImage_menuitems()?>" style="max-width: 100%;max-height:100%;"/>
                                <?php else:?>
                                    <i class="fa fa-eye-slash fa-5x mt-5" style="color: #DDD;"></i>
                                <?php endif?>
                            </div>
                            <div class="col-12" style="padding:5px;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">menuitem</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image_menuitems" onChange="viewAll(this, 'viewsImage')" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                                    </div>
                                </div>
                            </div>
                           

                        </div>
                        <?php if($menuitem->getMenu_menuitems()==="services" && $menuitem->getType_menuitems()==="service"):?>
                            <button type="button" class="btn btn-dark btn-sm btn-block mt-4" data-toggle="modal" data-target="#modalForm">
                                Ajouter une image
                            </button>
                        <?php endif?>
                    </div>

                    <div class="col-8 p-4">

                        <div class="row">

                                <div class="col-12" style="padding:5px;">
                                    Titre
                                    <input type="text" name="titre_menuitems" class="form-control" value="<?=$menuitem->getTitre_menuitems()?>"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Menu
                                <select type="text" name="menu_menuitems" class="form-control">
                                        <?php foreach($menus as $k=>$v) {?>
                                            <option value="<?=$k?>" <?php if($k === $menuitem->getMenu_menuitems()) echo "SELECTED";?>><?=$v?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                               

                                <div class="col-12" style="padding:5px;">
                                Type
                                    <select type="text" name="type_menuitems" class="form-control for-check">
                                        <?php foreach($types as $k=>$v) {?>
                                            <option value="<?=$k?>" <?php if($k === $menuitem->getType_menuitems()) echo "SELECTED";?>><?=$v?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Détails
                                    <textarea type="text" name="details_menuitems" id="specialContent" class="form-control for-check specialarea"><?=$menuitem->getDetails_menuitems()?></textarea>
                                </div>


                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="updateMenuitems(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                                <div class="col-4 offset-4">
                                    <button type="button" class="btn btn-sm btn-block btn-danger" onClick="deleteMenuitems(this)" action="<?=$router->generateUri('admin.menuitems.gestion.edit.post.deletemenuitems', ["action"=>"deletemenuitems", "code"=>$menuitem->getCode_menuitems()])?>">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </button>
                                </div>
                        </div>

                    </div>

                </div>
           
</form>

<?php if($menuitem->getMenu_menuitems()==="services" && $menuitem->getType_menuitems()==="service"):?>

<div id="content_image_relative">

<?= $image_relative ?? "..." ?>

</div>

<?php endif?>


<?php endforeach ?>