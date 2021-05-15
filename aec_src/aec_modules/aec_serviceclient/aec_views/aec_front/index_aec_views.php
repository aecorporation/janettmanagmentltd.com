<?=$image_title ?? "..."?>

<div class="container-fluid">
			
                <div class="row" style="padding-top:50px;">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                        <?php foreach ($obj as $obj): ?>

                        <?php $donnees = json_decode($obj->getDonnees_serviceclient()); ?>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <span class="row ml-0 mr-0 mb-3 aec-reveal" aec-delay="0.2" style="font-family:Arial Narrow;color:#969696;border-bottom:1px solid #DDD;font-size:25px;">
                                    NOTRE BUREAU 
                                </span>
                                    <span class="aec-reveal" aec-delay="0.4" style="float:left;width:100%;margin:5px 0px;font-family:Arial Narrow;font-size:17px;color:#969696;">
                                        <?=$donnees->details ?>
                                    </span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 aec-reveal" aec-delay="0.5">
                                    <img src="<?= $container->get("folder.img") ?>insta_icon.png" class="fb_icon"/>
                                    <img src="<?= $container->get("folder.img") ?>fb_icon.png" class="insta_icon"/>
                                </div>
                            </div>

                            <div class="row aec-reveal" aec-delay="0.5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top:20px;">
                                <span class="row ml-0 mr-0 mb-3 aec-reveal" aec-delay="0.2" style="font-family:Arial Narrow;color:#969696;border-bottom:1px solid #DDD;font-size:25px;">
                                    LOCALISATION
                                </span>
                                <span class="aec-reveal" aec-delay="0.5" style="float:left;width:95%;margin:0px 0px 20px 0px;font-family:Arial Narrow;color:#969696;border-bottom:1px solid #DDD;font-size:15px;">
                                <?php if(!is_null($donnees) && $donnees->localisation!==null){?>
                                    <iframe src="<?= !is_null($donnees) ? $donnees->localisation : null?>" style="width:100%; height:100%;"></iframe>
                                <?php } ?>
                                </span>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <form action="<?=$router->generateUri("front.messagerie.sendMessage", ["action"=>"sendMessage"])?>"
                    onSubmit="sendMessageOnContact(this); return false;" 
                    class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 aec-reveal" aec-delay="0.5"
                    style="color:#676767;">

                    <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>				

                    <span class="row ml-0 mr-0 mb-3" style="font-family:Arial Narrow;color:#969696;border-bottom:1px solid #DDD;font-size:25px;">
                            ECRIVEZ-NOUS 
                        </span>
                        <div class="row">
                            <div class="col-12" style="padding:10px;">
                                <span>Nom & prénoms</span><br/>
                                <input type="text" class="form-control for-check" name="expediteur_messagerie"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" style="padding:10px;">
                                <span>E-mail</span><br/>
                                <input type="text" class="form-control for-check" name="email_messagerie"/>
                            </div>
                            <div class="col-6" style="padding:10px;">
                                <span>Contact(s)</span><br/>
                                <input type="text" class="form-control for-check" name="contacts_messagerie"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="padding:10px;">
                                <span>Object</span><br/>
                                <select class="form-control for-check" name="objet_messagerie">
                                    <option value="Tous">Tous</option>
                                    <option>RENSEIGNEMENT</option>
                                    <option>AIDE</option>
                                    <option>SUGGESTION</option>
                                    <option>PLAINTE</option>
                                    <option>AUTRE</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding:10px;">
                                <span>Contenu</span><br/>
                                <textarea class="form-control for-check" rows="10" name="contenu_messagerie"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding:10px;">
                               <button type="submit" class="btn text-light" style="float:right; background:#ff0071;">ENVOYER LE MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            
	
</div>