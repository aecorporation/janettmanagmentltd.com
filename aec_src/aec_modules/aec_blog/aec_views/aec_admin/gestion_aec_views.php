<section class="col-12 border border-light" style="height:50px;">

    <span class="row  bg-light p-2">

        <div class="col-7">
            <?=$title_1 ?? "..."?>
        </div>

        <div class="col-5 text-right">
            <a class="btn btn-sm text-dark" style="cursor:pointer;" data-toggle="tooltip" title="Liste fichiers"  href="<?=$router->generateUri("admin.blog.gestion", ["action"=>"gestion"])?>">
            <i class="fa fa-list" style="font-size:18px;cursor:pointer;"></i>
            </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-sm text-dark" style="cursor:pointer;" data-toggle="tooltip" title="Enregistrer un fichier"  href="<?=$router->generateUri("admin.blog.gestion.save", ["action"=>"save"])?>">
            <i class="fa fa-save" style="font-size:18px;cursor:pointer;"></i>
            </a>
        </div>

    </span>

</section>

<section class="col-12 border">

<?=$element ?? "..." ?>

</section>