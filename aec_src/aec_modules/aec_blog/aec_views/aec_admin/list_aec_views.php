
<div class="row">
    <div class="col-12" style="background:#DDD; font-family: arial black; padding:5px;">
            <?=$message->admin->body->site->img_pub_video_2->titles[0]?>
    </div>
</div>


<form class="row" id="searchBlog" action="<?=$router->generateUri("admin.blog.gestion.post.searchblog", ["action"=>"searchblog"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>


    <div class="col-12" style="border:1px solid #DDD; min-height:100px; padding:10px; font-size:12px;">
        <div class="row">
            <div class="col-12">
                 <i class="fa fa-search"></i> <?=$message->admin->body->site->img_pub_video_2->title_search?>
            </div>
            <div class="col-2" style="padding:5px;">
            De
                <input type="date" name="dateD" class="form-control" onchange="searchBlog()" onkeyup="searchBlog()"/>
            </div>
            <div class="col-2" style="padding:5px;">
            À
                <input type="date" name="dateA" class="form-control"  onchange="searchBlog()" onkeyup="searchBlog()"/>
            </div>
            <div class="col-8" style="padding:5px;">
                Menu
                <select type="text" name="menu_blog" class="form-control" onchange="searchBlog()">
                    <?php foreach($menus as $k=>$v) {?>
                        <option value="<?=$k?>"><?=$v?></option>
                    <?php } ?>
                </select>
            </div>
           
        </div>
    </div>
</form>

<div class="row" style="margin-top:10px;" id="table">
    <?=$table ?? "..."?>
</div>
