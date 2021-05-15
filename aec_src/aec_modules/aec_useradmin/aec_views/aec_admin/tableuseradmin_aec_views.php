
<?php if($nb > 0){ ?>
    
    <div class="col-12" style=" font-size:12px; margin-bottom:10px;">
        <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> <?=$message->admin->body->administration->result?>: <?= $nb?>
    </div>    
    <div class="col-12" style="height:500px;overflow-x: hidden; overflow-y:auto; padding:0;">

        <table class="table table-striped table-responsive{-sm|-md|-lg|-xl}" style="font-size:12px;">
            <thead>
                <tr class="table-active">
                    <th>Image</th>
                    <th>Nom et prénoms</th>
                    <th>Contacts</th>
                    <th>E-mail</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){?>
                <tr>
                    <td><img src="<?=$container->get("folder.img.useradmin")?><?=$user->getImage_useradmin()?>" style="height:50px;"/></td>
                    <td><?=$user->getNom_useradmin()?> <?=$user->getPrenoms_useradmin()?></td>
                    <td><?=$user->getContact_useradmin()?></td>
                    <td><?=$user->getEmail_useradmin()?></td>
                    <td><?=$user->getVille_useradmin()?></td>
                    <td><?=$user->getPays_useradmin()?></td>
                    <td align="right"> 
                        <a href="<?=$router->generateUri("admin.administrateur.visualiseradmin", ["action"=>"visualiseradmin", "code"=>$user->getCode_useradmin()])?>">
                        <i style="cursor: pointer;" data-toggle="tooltip" title="Apercu de l'administrateur" class="fa fa-edit text-dark"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </tbody>

        </table>
</div>


<?php } else{?>
            <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-user-tie fa-5x"></i></br>
                    AUCUN ADMINISTRATEUR
                </h4>
            </div>
<?php } ?>