
        <form id="searchPrivilege" method="POST" action="<?=$router->generateUri("admin.administrateur.createPrivilege.post.searchPrivilege", ["action"=>"searchPrivilege"])?>" class="col-12">
            <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>
            <div class="row">
                <div class="col-12" style="padding: 10px;">
                        <i class="fa fa-search"></i>  FILTRE DE RECHERCHE</br></br>
                        <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light text-dark" id="addon-wrapping" style="cursor:pointer;" onClick="clearnInput()"><i class="fa fa-times"></i></span>
                        </div>
                        <input type="text" id="inputSearch" onKeyup="searchPrivilege(this)" name="search" placeholder="Entrer une expression" class="form-control"/>
                        </div>
                </div>
            </div>
        </form>