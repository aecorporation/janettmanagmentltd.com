
<div class="row">
    <div class="col-12" style="background:#DDD; font-family: arial black; padding:5px;">
            <?=$message->admin->body->site->slide_show->titles[0]?>
    </div>
</div>


<form class="row">
    <div class="col-12" style="border:1px solid #DDD; min-height:100px; padding:10px; font-size:12px;">
        <div class="row">
            <div class="col-12">
                 <i class="fa fa-search"></i> <?=$message->admin->body->site->slide_show->title_search?>
            </div>
            <div class="col-6" style="padding:5px;">
            <?=$message->admin->body->site->slide_show->form_search[0]?>
                <input type="date" class="form-control"/>
            </div>
            <div class="col-6" style="padding:5px;">
            <?=$message->admin->body->site->slide_show->form_search[1]?>
                <input type="date" class="form-control"/>
            </div>
        </div>
    </div>
</form>
<div class="row" style="margin-top:10px;">

    <div class="col-12" style=" font-size:12px; margin-bottom:10px;">
        <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> <?=$message->admin->body->site->slide_show->result?>: 15
    </div>    
    <div class="col-12" style="height:500px;overflow-x: hidden; overflow-y:auto;">
        <table class="table table-striped table-responsive{-sm|-md|-lg|-xl}" style="font-size:12px;">
            <thead>
                <tr class="table-active">
                    <th><?=$message->admin->body->site->slide_show->table[0]?></th>
                    <th><?=$message->admin->body->site->slide_show->table[1]?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<9; $i++){?>
                <tr>
                    <td><img src="<?=$container->get("folder.slide")?>1.jpg" style="height:50px;"/></td>
                    <td>Collection 2020</td>
                    <td> 
                        <button class="btn btn-danger float-right" style="margin-right:5px;"><i class="fa fa-trash"></i></button>
                        <button class="btn btn-light float-right" style="margin-right:5px;"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
                <?php } ?>

            </tbody>

        </table>
    </div>
</div>