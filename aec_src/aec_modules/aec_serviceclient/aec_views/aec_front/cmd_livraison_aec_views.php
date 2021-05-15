<?=$image_title ?? "..."?>



<?php foreach ($obj as $obj): ?>

<?php $donnees = json_decode($obj->getDonnees_serviceclient()); ?>

<div class="container-fluid aec-reveal">
			<div class="row aec-reveal" aec-delay="0.2" style="padding-top:30px;">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" align="center" style="padding:10px;">
					<span class="title_page_all"><?=  $donnees->titre ?></span>
                </div>
            </div>
            <div class="row aec-reveal" aec-delay="0.5" style="padding-top:50px;">
                    <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding:10px; padding-top:0;">
                        <?=  $donnees->soustitre ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
							<p>
							<img src="<?=$container->get("folder.img.site")?><?= isset($donnees) ? $donnees->image : null?>" style="max-width:100%; auto; float:left; margin: 10px 10px"/>
                            <?=  $donnees->details ?>
							</p>
                        </div>
                    </div>
                    </div>
                </div>
		
</div>
    

<?php endforeach ?>
