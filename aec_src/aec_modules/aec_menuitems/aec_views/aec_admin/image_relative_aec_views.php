


<h5 class="mt-5 mb-5" style="border:0px solid #DDD;"> LISTE DES IMAGES RELATIVES</h5>

<div class="row mb-5">

    <?php foreach($childrenmenuitems as $item):?>

        <div id="line-<?=$item->getCode_children_menuitems()?>" class="card ml-2 mr-2 mb-4" style="width: 18rem;">
          <div style="height:150px; border:0px solid #DDD; overflow: hidden;">
            <?php if($item->getImage_children_menuitems() != null):?>
                <img class="card-img-top" 
                src="<?=$container->get("folder.img.menuitems")?><?=$item->getImage_children_menuitems()?>" 
                style="max-width: 100%; max-height: 100%;"/>
                <?php else:?>
                <i class="fa fa-eye-slash fa-5x mt-5" style="color: #DDD;"></i>
            <?php endif?>
          </div>
        <div class="card-body">
            <p class="card-text p-2"><?=substr($item->getContenu_children_menuitems(), 0, 200)?> ...</p>
            <button type="button"  data-toggle="modal" data-target="#modalForm_<?=$item->getCode_children_menuitems()?>" class="btn btn-dark btn-sm">Editer</button>
            <button type="button" class="btn btn-danger btn-sm float-right" 
            action="<?=$router->generateUri("admin.menuitems.gestion.edit.post.deletechildrenmenuitems", 
            ["action"=>"deletechildrenmenuitems", "code"=>$item->getCode_children_menuitems()])?>"
            id="<?=$item->getCode_children_menuitems()?>"
            onClick="deleteChildrenMenuitems(this)">Supprimer</button>
        </div>


        
<!-- Modal -->
<form class="modal fade" 
action="<?=$router->generateUri("admin.menuitems.gestion.edit.post.updatechildrenmenuitems", ["action"=>"updatechildrenmenuitems"])?>"
id="modalForm_<?=$item->getCode_children_menuitems()?>" 
tabindex="-1" role="dialog"  
data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AJOUTER UNE IMAGE AU SERVICE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
      <input type="hidden" name="codemenuitems_children_menuitems" value="<?=$item->getCodemenuitems_children_menuitems()?>"/>
      <input type="hidden" name="code_children_menuitems" value="<?=$item->getCode_children_menuitems()?>"/>

        <div class="row">
            <div class="col-12">
                Apercu d'image
                    <div class="col-12 mt-2"  id="viewsImage_2" style="background:#DDD; font-family: arial black; height:150px;">
                        <?php if($item->getCode_children_menuitems() != null):?>
                            <img class="card-img-top" src="<?=$container->get("folder.img.menuitems")?><?=$item->getImage_children_menuitems()?>" style="max-width: 100%;max-height:100%;"/>
                            <?php else:?>
                            <i class="fa fa-eye-slash fa-5x mt-5" style="color: #DDD;"></i>
                        <?php endif?>
                    </div>
                    <div class="col-12" style="padding:5px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image_children_menuitems" onChange="viewAll(this, 'viewsImage_2')" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                            </div>
                    </div>
                </div>
                                
            </div>
            <div class="col-12" style="padding:5px;">
                Détails
                <textarea type="text" name="contenu_children_menuitems" id="specialContent_<?=$item->getCode_children_menuitems()?>" class="form-control for-check specialarea"><?=$item->getContenu_children_menuitems()?></textarea>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-dark" onClick="updateChildrenMenuitems('<?=$item->getCode_children_menuitems()?>')">Enregistrer</button>
      </div>
    </div>
  </div>
</form>


</div>

    <?php endforeach?>

</div>
























<!-- Modal -->
<form class="modal fade" 
action="<?=$router->generateUri("admin.menuitems.gestion.save.post.savechildrenmenuitems", ["action"=>"savechildrenmenuitems"])?>"
id="modalForm" 
tabindex="-1" role="dialog"  
data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AJOUTER UNE IMAGE AU SERVICE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
      <input type="hidden" name="codemenuitems_children_menuitems" 
      value="<?= (isset($item)) ? $item->getCodemenuitems_children_menuitems():""?>"/>

        <div class="row">
            <div class="col-12">
                Apercu d'image
                    <div class="col-12 mt-2"  id="viewsImage_2" style="background:#DDD; font-family: arial black; height:150px;"></div>
                    <div class="col-12" style="padding:5px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01" style="font-size:12px;">Image</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image_children_menuitems" onChange="viewAll(this, 'viewsImage_2')" class="custom-file-input for-check" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choisir l'image</label>
                            </div>
                    </div>
                </div>
                                
            </div>
            <div class="col-12" style="padding:5px;">
                Détails
                <textarea type="text" name="contenu_children_menuitems" id="specialContent_2" class="form-control for-check specialarea"></textarea>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-dark" onClick="saveChildrenMenuitems()">Enregistrer</button>
      </div>
    </div>
  </div>
</form>
