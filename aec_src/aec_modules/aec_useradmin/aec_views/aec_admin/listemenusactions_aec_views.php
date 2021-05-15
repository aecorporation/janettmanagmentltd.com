
<!-- LISTE COMPLETE DES MENUS ET ACTIONS-->

    <div class="col-12" style=" margin-top:20px;">
    <div class="row">
    <div class="col-12" style="border:1px solid #DDD; padding:10px; min-height:100px; overflow-x: hidden; overflow-y:auto;">

        <div class="row">

            <?php foreach($router->getRoutesGets()["admin"] as $keyModule=>$valuesModule){ ?>
                <div class="col-12">
                        <div class="row" style="margin:0;">
                            <b><?=$keyModule?></b>
                        </div>
                        <div class="row bg-light  mb-2"  style="border:1px solid #DDD; padding:20px;">
                            <?php foreach($valuesModule as $keyItem=>$valueItem){?>
                                <div class="col-12">
                                    
                                    <?php if($optionAction === "profiladmin"){?>
                                        <?php if(isset($menus_privilege) && (in_array($keyItem, $menus_privilege))){?>
                                            <input type="checkbox" checked value="<?=$keyItem?>" disabled/> <?=$valueItem["description"]?>
                                        <?php }?>
                                    <?php }else{?>
                                        <input type="checkbox" <?=isset($menus_privilege) ? (in_array($keyItem, $menus_privilege) ? "checked":"") : ""?> name="menus_privilege[]" value="<?=$keyItem?>"/> <?=$valueItem["description"]?>
                                    <?php }?>


                                    <?php 
                                    // PROFIL
                                    if($optionAction === "profiladmin"){?>

                                        <?php if(isset($user) && in_array($keyItem, $menusForbiden_useradmin)){?>

                                            <input type="checkbox" value="<?=$keyItem?>" disabled/> <?=$valueItem["description"]?>
                                            <span  class="float-right" >
                                                <input type="checkbox" checked value="<?=$keyItem?>" disabled/> Interdir
                                            </span>
                                        <?php }?>
                                        <?php if(isset($user) && in_array($keyItem, $menusAuthorised_useradmin)){?>

                                            <input type="checkbox" value="<?=$keyItem?>" disabled/> <?=$valueItem["description"]?>
                                            <span  class="float-right" >
                                                <input type="checkbox" checked value="<?=$keyItem?>" disabled/> Autoriser
                                            </span>
                                        <?php }?>

                                    <?php }else{?>


                                        <?php if(isset($user) && in_array($keyItem, $menus_privilege)){?>
                                            <span  class="float-right" >
                                                <input type="checkbox"<?=isset($menusForbiden_useradmin) ? (in_array($keyItem, $menusForbiden_useradmin) ? "checked":"") : ""?> name="menusForbiden_useradmin[]" value="<?=$keyItem?>"/> Interdir
                                            </span>
                                        <?php }?>
                                        <?php if(isset($user) && !in_array($keyItem, $menus_privilege)){?>
                                            <span  class="float-right" >
                                                <input type="checkbox"<?=isset($menusAuthorised_useradmin) ? (in_array($keyItem, $menusAuthorised_useradmin) ? "checked":"") : ""?> name="menusAuthorised_useradmin[]" value="<?=$keyItem?>"/> Autoriser
                                            </span>
                                        <?php }?>

                                    <?php }?>


                                </div>
                                <div class="col-12 mt-2 mb-2" style="border: 1px solid #DDD; padding:5px; background:#e6d8de2b;">
                                                
                                                <?php foreach($router->getRoutesPosts()["admin"] as $keyPostModule=>$valuesPostModule){ ?>
                                    
                                                        <?php foreach($valuesPostModule as $keyPostItem=>$valuePostItem){?>
                                                    
                                                            <?php if(strstr($valuePostItem["name"], $valueItem["name"])){?>
                                                                        <div class="col-12">
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                                                                    
                                                                                    <?php 
                                                                                    //PROFIL
                                                                                    if($optionAction === "profiladmin"){?>

                                                                                        <?php if(isset($menus_privilege) && (in_array($keyPostItem, $actions_privilege))){?>
                                                                                            <input type="checkbox" checked value="<?=$keyPostItem?>" disabled/> <?=$valuePostItem["description"]?>
                                                                                        <?php }?>

                                                                                    <?php }else{?>
                                                                                        <input type="checkbox" <?=isset($actions_privilege) ? (in_array($keyPostItem, $actions_privilege) ? "checked":"") : ""?> name="actions_privilege[]" value="<?=$keyPostItem?>"/> <?=$valuePostItem["description"]?>
                                                                                    <?php }?>

                                                                                    <?php 
                                                                                    // PROFIL
                                                                                    if($optionAction === "profiladmin"){?>

                                                                                        <?php if(isset($user) && in_array($keyPostItem, $actionsForbiden_useradmin)){?>
                                                                                            <input type="checkbox" value="<?=$keyPostItem?>" disabled/> <?=$valuePostItem["description"]?>
                                                                                            <span  class="float-right" >
                                                                                                <input type="checkbox" checked value="<?=$keyPostItem?>" disabled/> Interdir
                                                                                            </span>
                                                                                        <?php } ?>
                                                                                        <?php if(isset($user) && in_array($keyPostItem, $actionsAuthorised_useradmin)){?>
                                                                                            <input type="checkbox" value="<?=$keyPostItem?>" disabled/> <?=$valuePostItem["description"]?>
                                                                                            <span  class="float-right" >
                                                                                            <input type="checkbox" checked value="<?=$keyPostItem?>" disabled/> Autoriser
                                                                                            </span>
                                                                                        <?php } ?>


                                                                                    <?php }else{?>

                                                                                        <?php if(isset($user) && in_array($keyPostItem, $actions_privilege)){?>
                                                                                            <span  class="float-right" >
                                                                                            <input type="checkbox"<?=isset($actionsForbiden_useradmin) ? (in_array($keyPostItem, $actionsForbiden_useradmin) ? "checked":"") : ""?> name="actionsForbiden_useradmin[]" value="<?=$keyPostItem?>"/> Interdir
                                                                                            </span>
                                                                                        <?php } ?>
                                                                                        <?php if(isset($user) && !in_array($keyPostItem, $actions_privilege)){?>
                                                                                            <span  class="float-right" >
                                                                                            <input type="checkbox"<?=isset($actionsAuthorised_useradmin) ? (in_array($keyPostItem, $actionsAuthorised_useradmin) ? "checked":"") : ""?> name="actionsAuthorised_useradmin[]" value="<?=$keyPostItem?>"/> Autoriser
                                                                                            </span>
                                                                                        <?php } ?>

                                                                                    <?php } ?>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                        <?php } ?>
                                                <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
            <?php } ?>
            
        </div>
        
    </div>

    </div>

    </div>