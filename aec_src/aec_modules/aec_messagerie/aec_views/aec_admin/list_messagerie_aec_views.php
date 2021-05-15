<div class="row">
    <div class="col-12" style="background:#DDD; font-family: arial black; padding:5px;">
            <?=$message->admin->body->messagerie->titles[0]?>
    </div>
</div>


<form class="row" id="searchMessagerie" action="<?=$router->generateUri("admin.messagerie.index.post.searchMessagerie", ["action"=>"searchMessagerie"])?>">

<input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

    <div class="col-12" style="border:1px solid #DDD; min-height:100px;font-size:12px; padding-top:10px;">
        <div class="row">
            <div class="col-12">
                 <i class="fa fa-search"></i> FILTRE DE RECHERCHE
            </div>
            <div class="col-2">
            De
                <input type="date" name="dateD" class="form-control" onchange="searchMessagerie()" onkeyup="searchMessagerie()"/>
            </div>
            <div class="col-2">
            À
                <input type="date" name="dateA" class="form-control" onchange="searchMessagerie()" onkeyup="searchMessagerie()"/>
            </div>
            <div class="col-2">
            Etat
                <select class="form-control" name="etat" onchange="searchMessagerie()">
                    <option value="Tous">Tous</option>
                    <option value="NON LU">Messages non lus</option>
                    <option value="LU">Messages lus</option>
                </select>
            </div>
            <div class="col-3">
            Objet
                <select class="form-control" name="objet" onChange="searchMessagerie()">
                    <option value="Tous">Tous</option>
                    <option>RENSEIGNEMENT</option>
                    <option>AIDE</option>
                    <option>SUGGESTION</option>
                    <option>PLAINTE</option>
                    <option>AUTRE</option>
                </select>
            </div>
            <div class="col-3">
            Expression
                <input type="text" class="form-control" name="expr" onkeyup="searchMessagerie()"/>
            </div>
        </div>
    </div>
</form>
<div class="row" style="margin-top:10px;" id="table">
    <?=$table ?? "..."?>
</div>
