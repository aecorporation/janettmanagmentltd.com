<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\HistoriqueModel;

class HistoriqueGetControl extends ControlBack
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        //Instancier les modules
        $this->model = $this->container->get(HistoriqueModel::class);
    }

}