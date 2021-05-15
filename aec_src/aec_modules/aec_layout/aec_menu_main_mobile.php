<nav>
    <h5 class="title-menu-mobile">
        <span> Menu du site</span>
        <span> 
            <i class="fa fa-times aec-btn-bars" onClick="Effects.transition_panel_inverse('aec-navbar-mobile', 'aec-contener-main')"></i>
        </span>
    </h5>
    <div class="content-menu-mobile">
        <?php foreach($container->get("frontFootMenu") as $item): ?>
            <?=$item->menuRender("frontFootMenu")?>
        <?php endforeach ?>
        <?= $produitsWidgetExts->menuRender("") ?? ""?>
    </div>

</nav>

