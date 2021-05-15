   

    <?php if(count($messages) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-envelope fa-5x"></i></br>
                    AUCUN MESSAGE
                </h4>
            </div>
<?php return false;}?>


    <?php foreach($messages as $message){?>

    
    <div class="row mb-4 bg-light">
        <div class="col-11" style="background:#DDD; font-family: arial black; padding:5px;">
        <i class="fa fa-envelope"></i> Visualiser un message
        </div>
        <div class="col-1 text-right" style="background:#DDD; font-family: arial black; font-size:16px;">
        <i class="fa fa-trash text-dark" onClick="deleteMessagerie(this)" style="cursor:pointer;" action="<?=$router->generateUri("admin.messagerie.index.post.deleteMessagerie", ["action"=>"deleteMessagerie","id"=>$message->getId_messagerie()])?>"></i>
        </div>              
    </div>

        <div class="row mb-4"><div class="col-12" style="padding:5px; font-weight:bold;"><i class="fa fa-user"></i> INFO EXPEDITEUR</div></div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4" style="padding:5px; font-weight:bold;"> Type de message</div><div class="col-8" style="padding:5px;">: <?= $message->getType_messagerie() ?? "AUCUNE"?></div>
                    <div class="col-4" style="padding:5px; font-weight:bold;">Expediteur</div><div class="col-8" style="padding:5px;">:  <?=$message->getExpediteur_messagerie() ?? "AUCUNE"?></div>
                    <div class="col-4" style="padding:5px; font-weight:bold;">E-mail</div><div class="col-8" style="padding:5px;">:<?= $message->getEmail_messagerie() ?? "AUCUNE"?></div>
                    <div class="col-4" style="padding:5px; font-weight:bold;"> Contacts</div><div class="col-8" style="padding:5px;">: <?= $message->getContacts_messagerie() ?? "AUCUNE"?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-4" style="padding:5px; font-weight:bold;"> Compagnie</div><div class="col-8" style="padding:5px;">: <?= $message->getCompagnie_messagerie() ?? "AUCUNE"?></div>
                    <div class="col-4" style="padding:5px; font-weight:bold;"> Etat</div><div class="col-8" style="padding:5px;">: <?= ($message->getDateview_messagerie()== NULL) ? "NON LU" : "LU"?></div>
                    <div class="col-4" style="padding:5px; font-weight:bold;"> Date</div><div class="col-8" style="padding:5px;">: <?= $message->getDate_at_messagerie() ?? "AUCUNE"?></div>

                </div>
            </div>
        </div>

        <div class="row mt-4 mb-2"><div class="col-12" style="padding:5px; font-weight:bold;"><i class="fa fa-file"></i> CONTENU DU MESSAGE</div></div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="row">
                    <div class="col-12" style="padding:5px; font-size:18px;"> <?= $message->getContenu_messagerie()?></div>
                </div>
            </div>
        </div>
    <?php  } ?>
