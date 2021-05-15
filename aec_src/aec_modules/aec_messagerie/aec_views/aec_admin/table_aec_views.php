
    <?php if(count($messages) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-envelope fa-5x"></i></br>
                    AUCUN MESSAGE
                </h4>
            </div>
<?php return false;}?>
  
    <div class="col-12" style=" font-size:12px; margin-bottom:10px;">
        <i class="fa fa-envelope"></i> <?=$message->admin->body->messagerie->result?>: <?=count($messages)?>
    </div>    
    <div class="col-12" style="height:500px;overflow-x: hidden; overflow-y:auto; padding:0;">
        <table class="table table-striped table-responsive{-sm|-md|-lg|-xl}" style="font-size:12px;">
            <thead>
                <tr class="table-active">
                    <th>Date</th>
                    <th>Expéditeur</th>
                    <th>E-mail</th>
                    <th>Contact</th>
                    <th>Objet</th>
                    <th>Type</th>
                    <th>Etat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($messages as $message){?>
                <tr style="background:<?= ($message->getDateview_messagerie()== NULL) ? "#EEE" : "#FFF"?>" id="line-<?=$message->getId_messagerie()?>">
                    <td><?=$message->getDate_at_messagerie()?></td>
                    <td><?=$message->getExpediteur_messagerie()?></td>
                    <td><?=$message->getEmail_messagerie()?></td>
                    <td><?=$message->getContacts_messagerie()?></td>
                    <td><?=$message->getObjet_messagerie()?></td>
                    <td><?=$message->getType_messagerie()?></td>
                    <td><?= ($message->getDateview_messagerie()== NULL) ? "NON LU" : "LU"?></td>
                    <td align="right"> 
                        <a class="mr-3 text-dark" onClick="Rooter.rootingComponent(this)" aec-rooter-view="one_message" href="<?=$router->generateUri("admin.messagerie.visualiser", ["action"=>"visualiser", "id"=>$message->getId_messagerie()])?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <i class="fa fa-trash" id="<?=$message->getId_messagerie()?>" onClick="deleteMessagerie(this)" action="<?=$router->generateUri("admin.messagerie.index.post.deleteMessagerie", ["action"=>"deleteMessagerie","id"=>$message->getId_messagerie()])?>"></i>
                    </td>
                </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>/