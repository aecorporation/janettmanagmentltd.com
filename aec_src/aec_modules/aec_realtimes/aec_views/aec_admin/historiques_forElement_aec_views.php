
<div class="accordion col-12 p-0" id="historik">

    <div class="card">

            <div class="card-header p-0" id="headingThree">

                    <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#historik_" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fa fa-history"></i> HISTORIQUES
                        </button>
                    </h2>

            </div>  

            <div id="historik_" class="collapse" aria-labelledby="headingThree" data-parent="#historik">

                    <div class="card-body">

                        <aside class="col-12 mb-2">

                            <div class="row">

                                <?php foreach($object->getHistories() as $history){?>
                                    <div class="col-12 p-2">
                                        <i class="fa fa-check"></i> <?=$history->libele_historique?> : <?=$history->date_at_historique?> par : 
                                        <?= !is_null($history->nom_useradmin) ? $history->nom_useradmin : ""?>  <?= !is_null($history->prenoms_useradmin) ? $history->prenoms_useradmin : ""?>
                                    </div>
                                <?php }?>

                            </div>
                            
                        </aside>

                    </div>

            </div>

    </div>

</div>