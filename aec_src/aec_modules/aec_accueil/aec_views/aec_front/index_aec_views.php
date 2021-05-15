
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


	<!--##########################  CONTENU PAGE QUI SOMMES-NOUS ?  ##################--->
	<?php foreach($blogs as $blog):?>

        <?php if($blog->getMenu_blog() ==="qsn"):?>

	<div class="row content_page_qsn aec-panel" aec-action="/">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5" style="height:100%; overflow: auto;">
				<div class="row" style="height:30px;"></div>
						<div class="row aec-reveal" aec-delay="0.3">
							<div align="center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<span class="titre_page"><?=$blog->getTitre_blog()?></span>
								<hr class="qsn aec-reveal" aec-delay="0.4" />
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal"  aec-delay="0.5">
							<div class="contenu_page_text col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
								<?=$blog->getDetails_blog()?>
							</div>
						</div>
		</div>
	</div>

	<?php break; ?>

	<?php endif?>

	<?php endforeach ?>

<!--##########################  FIN DU CONTENU PAGE QUI SOMMES-NOUS ?  ##################--->


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


	<!--##########################  CONTENU PAGE MISSION ET VISION  ##################--->

	<?php foreach($blogs as $blog):?>

		<?php if($blog->getMenu_blog() ==="mission-et-vision"):?>

	<div class="row content_page_mv aec-panel" aec-action="/mission_et_vision">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5"  style="height:100%; overflow: auto;">
				<div class="row" style="height:30px;"></div>
						<div class="row aec-reveal" aec-delay="0.1">
							<div align="center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<span class="titre_page aec-reveal" aec-delay="0.1"><?=$blog->getTitre_blog()?></span>
								<hr class="mv" />
								<span class="subtitre_page aec-reveal" aec-delay="0.2"><?=$blog->getSoustitre_blog()?></span>
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal" aec-delay="0.2">
							<?php $i=0; foreach($menu_menuitems as $item): $i+=0.01;?>
								<?php if($item->menu_menuitems ==="mission_vision"):?>

									<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center mb-3 aec-reveal" 
									aec-delay="<?=$i?>">
										<span class="titre_mv aec-reveal" aec-delay="0.1">
										<?php if($item->image_menuitems != null):?>
											<img src="<?=$container->get("folder.img.menuitems")?><?=$item->image_menuitems?>" 
											style="height:40px; border: 2px solid #DDD;"/>
										<?php else:?>
											<i class="fa fa-image" style="color: #DDD;"></i>
										<?php endif?>
										</span>
										<span class="titre_mv aec-reveal" aec-delay="0.2"><?=$item->titre_menuitems?></span>
										<span class="text_mv aec-reveal" aec-delay="0.3">
										<?=$item->details_menuitems?>
										</span><br/>
									</div>
							<?php endif?>
							<?php endforeach?>
							
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal" aec-delay="0.2">
							<div align="center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<span class="text_mv"><?=$blog->getDetails_blog()?></span>
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
		</div>
	</div>

	<?php break; ?>

	<?php endif?>

	<?php endforeach ?>
<!--##########################  FIN DU CONTENU MISSION ET VISION  ##################--->

<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

	<!--##########################  CONTENU PAGE NOS SERVICES  ##################--->

	<?php foreach($blogs as $blog):?>

		<?php if($blog->getMenu_blog() ==="services"):?>

	<div class="row content_page_serv aec-panel" aec-action="/nos_services">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5" style="height:100%; overflow: auto;">
				<div class="row" style="height:30px;"></div>
						<div class="row aec-reveal" aec-delay="0.1">
							<div align="center" class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12">
								<span class="titre_page"><?=$blog->getTitre_blog()?></span>
								<hr class="serv" />
							</div>
						</div>
						<div class="row aec-reveal" aec-delay="0.2">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<?=$blog->getDetails_blog()?></span>
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal" aec-delay="0.3" align="center">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<span class="subtitre_under_page">JANETT DISTRIBUE DIVERS PRODUIT TEL QUE :</span>
							</div>
						</div>
						<div class="row" style="height:10px;"></div>
						<div class="row">
							<div align="center" class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12">
								<div class="row">

								<?php foreach($menu_menuitems as $item): ?>
								<?php if($item->menu_menuitems ==="services"):?>

											<div class="mv_content_text col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 aec-reveal" aec-delay="0.4" 
											style="border:0px solid red;">
												<div class="content_full">
													<div class="row">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 aec-reveal" aec-delay="0.4" 
														style="overflow: hidden; height: 170px;">
														<?php if($item->image_menuitems != null):?>
															<img src="<?=$container->get("folder.img.menuitems")?><?=$item->image_menuitems?>" style="width: 100%; height: auto;"/>
														<?php else:?>
															<i class="fa fa-image" style="color: #DDD;"></i>
														<?php endif?>															
														<br/>
														</div>
													</div>
													<div class="row m-0 aec-reveal" aec-delay="0.5">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
															<span class="mv_titre_ text-center"><?=$item->titre_menuitems?></span>
														</div>
													</div>
													<div style="padding:5px 10px;" align="justify" class="row m-0 aec-reveal" aec-delay="0.5">
														<span class="mv_text">
														<?= substr($item->details_menuitems, 0, 100) ?>
														</span>
													</div>
													<div class="row" style="height:10px;"></div>
													<div align="center" class="row m-0">
														
														<button class="btn btn-sm bt-block mv_more aec-reveal" aec-delay="0.6" onClick="showChildrenOfServiceBlog('<?=$item->code_menuitems?>')">
															<i class="fa fa-plus-square" aria-hidden="true"></i><br/>
															VOIR PLUS
														</button>
													</div>
												</div>
											</div>



						<!-- Modal -->
							<template id="template<?=$item->code_menuitems?>">
							<div id="title">
							<h5 class="row m-0 p-4"><?=$item->titre_menuitems?></h5>
							</div>

							<div id="content">
							<div class="row m-0" style="height: 100%;">

								<?php if(count($item->children) > 0):?>

									<?php foreach($item->children as $child): ?>

											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12  text-center" style="border:0px solid red;">
													<div class="row m-0">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="overflow: hidden; height: 150px;">
														<?php if($child->getImage_children_menuitems() != null):?>
															<img src="<?=$container->get("folder.img.menuitems")?><?=$child->getImage_children_menuitems()?>" 
															style="width: auto; height: 100%;"/>
														<?php else:?>
															<i class="fa fa-image" style="color: #DDD;"></i>
														<?php endif?>															
														</div>
													</div>
													<div class="row m-0">
														<span class="mv_text">
														<?= substr($child->getContenu_children_menuitems(), 0, 100) ?>
														</span>
													</div>
											</div>

										<?php endforeach?>

										<?php endif?>
							</div>
							</div>


							</template>




									<?php endif?>

							<?php endforeach?>




								</div>
							</div>
						</div>
							
							
						</div>
		</div>


		<?php break; ?>


		<?php endif?>



<?php endforeach ?>
<!--##########################  FIN DU CONTENU NOS SERVICES  ##################--->



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


<!--##########################  CONTENU PAGE NOS CONTACTS  ##################--->
<?php foreach($blogs as $blog):?>

<?php if($blog->getMenu_blog() ==="contact"):?>

<div class="row content_page_cntcts aec-panel"  aec-action="/nos_contacts">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5"  style="height:100%; overflow: auto;">
						<div class="row aec-reveal" aec-delay="0.1">
							<div align="center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0" style="height:350px;">
								<?php foreach($serviceclients as $serviceclient):?>
									<iframe style="width: 100%; height: 100%;" src="<?=json_decode($serviceclient->getDonnees_serviceclient())->localisation?>"></iframe>
								<?php endforeach ?>
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal" aec-delay="0.2">
							<div align="center" class="contenu_page_text col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
								<span class="titre_page"><?=$blog->getTitre_blog()?></span><br/>
								<hr class="contcts" />
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						<div class="row aec-reveal" aec-delay="0.3">
							<div align="center" class="contenu_page_text col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
								<span style="font-size: 17px;font-weight:bold;font-family: Arial Narrow;color: #424242;">JANETT MANAGEMENT LTD</span><br/>
								<span style="font-size: 12px;font-family: Arial Narrow;color: #424242;">
								<?php foreach($serviceclients as $serviceclient):?>

								<?=json_decode($serviceclient->getDonnees_serviceclient())->details?>

								<?php break; ?>

								<?php endforeach ?>

								</span><br/>
								
							</div>
						</div>
						<div class="row" style="height:100px;"></div>
						<div class="row aec-reveal" aec-delay="0.4">
							<div align="center" class="contenu_page_text col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
							<span style="font-size: 18px;font-family: Arial Narrow;color: #787878;">
								Si vous souhaitez nous contacter par le site, merci de<br/><br/>
								<button class="button_contact" aec-router="/nos_contacts/envoi_message">CLIQUEZ ICI</button>
								</span><br/>
							</div>
						</div>
						<div class="row" style="height:50px;"></div>
						



		</div>
	</div>

	<?php break; ?>


	<?php endif?>


<?php endforeach ?>
<!--##########################  FIN DU CONTENU NOS CONTACTS  ##################--->

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


<!--##########################  CONTENU PAGE ENVOI DE MESSAGES  ##################--->
<?php foreach($blogs as $blog):?>

<?php if($blog->getMenu_blog() ==="envoi_message"):?>


<form action="<?=$router->generateUri("front.messagerie.sendMessage", ["action"=>"sendMessage"])?>"
onSubmit="sendMessageOnContact(this); return false;" 
class="row content_page_sendmessage aec-panel aec-reveal" aec-delay="0.1"   
aec-action="/nos_contacts/envoi_message">

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5"  style="height:100%; overflow: auto;">
	
	<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>		

		<div class="row" style="height:10px;"></div>
		<div class="row aec-reveal" aec-delay="0.1">
							<div style="padding:10px 0px;" align="center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<a aec-router="/nos_contacts">
									<i style="font-size:30px;color:#C3C3C3;" 
									class="fa fa-times-circle" 
									aria-hidden="true"></i>
								</a>
							</div>
						</div>
						<div class="row aec-reveal" aec-delay="0.2">
							<div style="padding:10px 0px;" align="center" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<span style="font-size:22px;color:#424242;"><?=$blog->getTitre_blog()?></span><br/>
							</div>
						</div>
						<div class="row aec-reveal" aec-delay="0.3">
										<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-10 offset-1">
											<div class="input-group mb-3 aec-reveal" aec-delay="0.4" style="margin:40px 0px;">
												<div class="input-group-prepend">
													<span style="width:100px;" class="input-group-text" id="inputGroup-sizing-default">Nom</span>
												</div>
												<input type="text" class="form-control for-check" name="expediteur_messagerie" aria-label="Default" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class="input-group mb-3 aec-reveal" aec-delay="0.4" style="margin:40px 0px;">
												<div class="input-group-prepend">
													<span style="width:100px;" class="input-group-text" id="inputGroup-sizing-default">Email</span>
												</div>
												<input type="text" class="form-control for-check" name="email_messagerie" aria-label="Default" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class="input-group mb-3 aec-reveal" aec-delay="0.5" style="margin:40px 0px;">
												<div class="input-group-prepend">
													<span style="width:100px;" class="input-group-text" id="inputGroup-sizing-default">Compagnie</span>
												</div>
												<input type="text" class="form-control for-check" name="compagnie_messagerie" aria-label="Default" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class="input-group mb-3 aec-reveal" aec-delay="0.6" style="margin:40px 0px;">
												<div class="input-group-prepend">
													<span style="width:100px;" class="input-group-text" id="inputGroup-sizing-default">Téléphone</span>
												</div>
												<input type="text" class="form-control for-check" name="contacts_messagerie" aria-label="Default" aria-describedby="inputGroup-sizing-default">
											</div>
											<div class="input-group mb-3 aec-reveal" aec-delay="0.7" style="margin:40px 0px;">
												<div class="input-group-prepend">
													<span style="width:100px;" class="input-group-text" id="inputGroup-sizing-default">Message</span>
												</div>
												<textarea class="form-control for-check" name="contenu_messagerie" style="height:100px;"></textarea>
											</div>
										</div>
							</div>
							<div class="row">
								<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 
								col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-10 offset-1 aec-reveal" aec-delay="0.8">
									<button type="submit" class="button_ct_sendmessage">ENVOYER VOTRE MESSAGE</button>
								</div>
							</div>
							<div class="row" style="height:50px;"></div>



		</div>
	</form>


	<?php break; ?>


	<?php endif?>


<?php endforeach ?>
<!--##########################  FIN DU CONTENU ENVOI DE MESSAGES  ##################--->

