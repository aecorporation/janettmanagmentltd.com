<?php if(count($menuitems) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-image fa-5x"></i></br>
                    AUCUN CONTENU
                </h4>
            </div>
<?php return false;}?>

<div class="col-12" style=" font-size:12px; margin-bottom:10px;">
<i class="fa fa-layer-group"></i> 
                RESULTAT : <?=(count($menuitems)<= 9) ? "0".count($menuitems) : count($menuitems)?>
    </div>    
    <div class="col-12" style="height:500px;overflow-x: hidden; overflow-y:auto;">
        <table class="table table-striped table-responsive{-sm|-md|-lg|-xl}" style="font-size:12px;">
            <thead>
                <tr class="table-active">
                    <th>Réf</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Menu</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $i =0; foreach($menuitems as $menuitem){?>
                <tr  id="line-<?=$menuitem->getCode_menuitems()?>">
                    <td><?=++$i?></td>
                    <td><?=$menuitem->getDate_at_menuitems()?></td>
                    <td>
                    <?php if($menuitem->getImage_menuitems() != null):?>
                        <img src="<?=$container->get("folder.img.menuitems")?><?=$menuitem->getImage_menuitems()?>" style="height:50px;"/>
                        <?php else:?>
                            <i class="fa fa-eye-slash fa-2x" style="color: #DDD;"></i>
                        <?php endif?>
                    </td>
                    <td><?=$menuitem->getTitre_menuitems()?></td>
                    <td><?=$menuitem->getMenu_menuitems()?></td>


                    <td align="right"> 

                        <a style="margin-right:5px;" href="<?=$router->generateUri("admin.menuitems.gestion.edit", ["action"=>"edit", "code"=>$menuitem->getCode_menuitems()])?>">
                        <i class="fa fa-edit text-dark"></i></a>
                        &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-trash text-danger" id="<?=$menuitem->getCode_menuitems()?>" onClick="deletemenuitems(this)" action="<?=$router->generateUri('admin.menuitems.gestion.edit.post.deletemenuitems', ["action"=>"deletemenuitems", "code"=>$menuitem->getCode_menuitems()])?>"></i>
                    </td>
                </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>