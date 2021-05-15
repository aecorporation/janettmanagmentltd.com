

    <?php if(isset($nb) && $nb > 0){ ?>
    
    <div class="col-12" style=" font-size:12px; margin-bottom:10px;">
        <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> <?=$message->admin->body->administration->result?>: <?= $nb?>
    </div>    
    <div class="col-12" style="height:500px;overflow-x: hidden; overflow-y:auto; padding:0;">

        <table class="table table-striped table-light table-responsive{-sm|-md|-lg|-xl}" style="font-size:12px;">
            <thead>
                <tr class="thead-light">
                    <th>REF</th>
                    <th>DATE</th>
                    <th>CODE</th>
                    <th>DESIGNATION</th>
                    <th>DETAILS</th>
                    <th class="text-right">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; foreach($privileges as $privilege){?>
                <tr>
                    <td><?=++$i?></td>
                    <td><?=$privilege->getCode_privilege()?></td>
                    <td><?=$privilege->getCode_privilege()?></td>
                    <td><?=$privilege->getNom_privilege()?></td>
                    <td><?=$privilege->getDetails_privilege()?></td>
                    <td align="right"> 
                        <a onClick="visualiserPrivilege(this)" style="cursor:pointer;" action="<?=$router->generateUri("admin.administrateur.createPrivilege.visualiserPrivilege", ["action"=>"visualiserPrivilege", "code"=>$privilege->getCode_privilege()])?>">
                            <i class="fa fa-eye text-dark  mr-4" title="Voir le privilège" data-toggle="tooltip" style="font-size:12px;"></i>
                        </a>

                        <a onClick="deletePrivilege(this)" id="<?=$privilege->getCode_privilege()?>" style="cursor:pointer;" action="<?=$router->generateUri("admin.administrateur.createPrivilege.post.deletePrivilege", ["action"=>"deletePrivilege"])?>">
                            <i class="fa fa-trash text-dark" title="Supprimer le privilège" data-toggle="tooltip" style="font-size:12px;"></i>
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
                    <i class="fa fa-table fa-5x"></i></br>
                    AUCUN PRIVILEGE
                </h4>
            </div>
<?php } ?>