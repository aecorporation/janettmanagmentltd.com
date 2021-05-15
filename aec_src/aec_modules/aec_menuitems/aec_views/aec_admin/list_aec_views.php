
<div class="row">
    <div class="col-12" style="background:#DDD; font-family: arial black; padding:5px;">
            <?=$message->admin->body->site->img_pub_video_2->titles[0]?>
    </div>
</div>


<form class="row" id="searchmenuitems" action="<?=$router->generateUri("admin.menuitems.gestion.post.searchmenuitems", ["action"=>"searchmenuitems"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>


    <div class="col-12" style="border:1px solid #DDD; min-height:100px; padding:10px; font-size:12px;">
        <div class="row">
            <div class="col-12">
                 <i class="fa fa-search"></i> <?=$message->admin->body->site->img_pub_video_2->title_search?>
            </div>
            <div class="col-2" style="padding:5px;">
            De
                <input type="date" name="dateD" class="form-control" onchange="searchMenuitems()" onkeyup="searchMenuitems()"/>
            </div>
            <div class="col-2" style="padding:5px;">
            À
                <input type="date" name="dateA" class="form-control"  onchange="searchMenuitems()" onkeyup="searchMenuitems()"/>
            </div>
            <div class="col-4" style="padding:5px;">
                Menu
                <select type="text" name="menu_menuitems" class="form-control" onchange="searchMenuitems()">
                    <?php foreach($menus as $k=>$v) {?>
                        <option value="<?=$k?>"><?=$v?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-4" style="padding:5px;">
                Type
                <select type="text" name="type_menuitems" class="form-control" onchange="searchMenuitems()">
                    <?php foreach($types as $k=>$v) {?>
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
