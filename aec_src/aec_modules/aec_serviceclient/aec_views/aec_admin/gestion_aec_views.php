<section class="col-12 border border-light" style="height:50px;">

    <span class="row  bg-light p-2">

        <div class="col-7">
            <?=$title_1 ?? "..."?>
        </div>

        <div class="col-5 text-right">

            <a style="color:#333; cursor:pointer;"  href="<?=$router->generateUri("admin.serviceclient.gestion.page", ["action"=>"gestion"])?>">
                <i class="fa fa-phone text-dark" id="listCateg" data-toggle="tooltip" title="Contact & Localisation" style="font-size:18px;cursor:pointer;"></i>
            </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        </div>

    </span>

</section>


<?=$element ?? "..." ?>