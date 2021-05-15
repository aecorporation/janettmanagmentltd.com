
<div class="col-12 container-image-illustration">
<div class="row">
    <?php foreach ($images as $image): ?>
        <img src="<?=$container->get("folder.img")?>/imagevideopub/<?=$image->getFichier_imagevideopub()?>" class="w-100" alt="..."/>
    <?php endforeach ?>
</div>
</div>
<div  class="col-12 p_title_page">
<?=$title_ ?? "..."?>
</div>
