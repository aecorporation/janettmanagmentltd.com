<?php if(count($fichiers) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-image fa-5x"></i></br>
                    AUCUN FICHIER
                </h4>
            </div>
<?php return false;}?>

<div class="col-12" style=" font-size:12px; margin-bottom:10px;">
<i class="fa fa-layer-group"></i> 
                RESULTAT : <?=(count($fichiers)<= 9) ? "0".count($fichiers) : count($fichiers)?>
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
                    <th>Etat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $i =0; foreach($fichiers as $fichier){?>
                <tr  id="line-<?=$fichier->getCode_imagevideopub()?>">
                    <td><?=++$i?></td>
                    <td><?=$fichier->getDate_at_imagevideopub()?></td>
                    <td><img src="<?=$container->get("folder.img.imagevideopub")?><?=$fichier->getFichier_imagevideopub()?>" style="height:50px;"/></td>
                    <td><?=$fichier->getTitre_imagevideopub()?></td>
                    <td><?=$fichier->getMenu_imagevideopub()?></td>
                    <td><?=$fichier->getEtat_imagevideopub()?></td>


                    <td align="right"> 

                        <a style="margin-right:5px;" href="<?=$router->generateUri("admin.imagevideopub.gestion.edit", ["action"=>"edit", "code"=>$fichier->getCode_imagevideopub()])?>">
                        <i class="fa fa-edit text-dark"></i></a>
                        &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-trash text-danger" id="<?=$fichier->getCode_imagevideopub()?>" onClick="deleteImagevideopub(this)" action="<?=$router->generateUri('admin.imagevideopub.gestion.edit.post.deleteImagevideopub', ["action"=>"deleteImagevideopub", "code"=>$fichier->getCode_imagevideopub()])?>"></i>
                    </td>
                </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>