<div class="col-12" style="font-size:12px;">

<div class="row">
        <div class="col-9 p-1" style="background:#eee; font-size:12px;">
            <?=$title ?? "..."?>
        </div>
        <div class="col-3 p-1" style="background:#eee;" align="right">

            <a title="Administrateurs" href="<?=$router->generateUri("admin.administrateur.gestion", ["action"=>"gestion"])?>"  class="btn btn-light btn-sm p-1">
                <i class="fa fa-user-tie" style="font-size:18px;"></i>
            </a>&nbsp;&nbsp;&nbsp;

            <a title="Privileges" href="<?=$router->generateUri("admin.administrateur.createPrivilege", ["action"=>"createPrivilege"])?>" class="btn btn-light btn-sm p-1">
                <i class="fa fa-book"  style="font-size:18px;"></i>
            </a>

        </div>
</div>

    <?=$element ?? "..." ?>
</div>