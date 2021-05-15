<form class="row" id="saveblog" action="<?=$router->generateUri("admin.blog.gestion.save.post.saveblog", ["action"=>"saveblog"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

                 

                    <div class="col-12 p-4">

                        <div class="row">

                                <div class="col-12" style="padding:5px;">
                                    Titre
                                    <input type="text" name="titre_blog" class="form-control for-check"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                    Sous-titre
                                    <input type="text" name="soustitre_blog" class="form-control"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                    Menu
                                <select type="text" name="menu_blog" class="form-control">
                                    <?php foreach($menus as $k=>$v) {?>
                                        <option value="<?=$k?>"><?=$v?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12" style="padding:5px;">
                                    Détails
                                    <textarea type="text" name="details_blog" id="specialContent" class="form-control specialarea"></textarea>
                                </div>


                                <div class="offset-8 col-4" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="saveBlog(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                        </div>

                    </div>
           
</form>
