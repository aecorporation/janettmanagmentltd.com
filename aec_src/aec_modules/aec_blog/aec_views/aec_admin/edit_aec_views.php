<?php if(count($blogs) <= 0){?>
    <div class="col-12 mt-5" align="center">
                <h4 class="text-dark">
                    <i class="fa fa-image fa-5x"></i></br>
                    AUCUN MENU
                </h4>
            </div>
<?php return false;}?>

<?php foreach($blogs as $blog){?>

<form class="row" id="updateBlog" action="<?=$router->generateUri("admin.blog.gestion.edit.post.updateblog", ["action"=>"updateblog"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
<input type="hidden" name="code_blog" value="<?=$blog->getCode_blog()?>"/>


                    <div class="col-12 p-4">

                        <div class="row">

                                <div class="col-12" style="padding:5px;">
                                Titre
                                    <input type="text" name="titre_blog" class="form-control" value="<?=$blog->getTitre_blog()?>"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Sous-titre
                                    <input type="text" name="soustitre_blog" class="form-control" value="<?=$blog->getSoustitre_blog()?>"/>
                                </div>
                                <div class="col-12" style="padding:5px;">
                                Menu
                                <select type="text" name="menu_blog" class="form-control">
                                        <?php foreach($menus as $k=>$v) {?>
                                            <option value="<?=$k?>" <?php if($k === $blog->getMenu_blog()) echo "SELECTED";?>><?=$v?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12" style="padding:5px;">
                                Détails
                                    <textarea type="text" name="details_blog" id="specialContent" class="form-control specialarea"><?=$blog->getDetails_blog()?></textarea>
                                </div>


                                <div class="col-4" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-dark" onClick="updateBlog(this)"> 
                                        <i class="fa fa-save"></i> <?=$message->admin->body->site->img_pub_video_2->btn?>
                                    </button>
                                </div>
                                <div class="col-4 offset-4" style="padding:5px;">
                                    <button type="button" class="btn btn-sm btn-block btn-danger" onClick="deleteBlog(this)" action="<?=$router->generateUri('admin.blog.gestion.edit.post.deleteblog', ["action"=>"deleteblog", "code"=>$blog->getCode_blog()])?>">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </button>
                                </div>
                        </div>

                    </div>
           
</form>

<?php } ?>
