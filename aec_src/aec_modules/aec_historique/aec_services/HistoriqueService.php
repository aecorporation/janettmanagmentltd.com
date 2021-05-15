<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_services;

use aeCorp\aec_Core\ServiceCrud;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_src\aec_modules\aec_historique\aec_models\HistoriqueModel;

class HistoriqueService extends ServiceCrud
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
        $this->model = $this->container->get(HistoriqueModel::class);
    }

/**
 * Enregistrer des Historiques
 */
public function save(Historique $historique)
{
       
    try{

        $result = $this->model->save($historique);

    }catch(OperationFailException $e){
        throw new OperationFailException($e->getMessage());
    }

}



}
