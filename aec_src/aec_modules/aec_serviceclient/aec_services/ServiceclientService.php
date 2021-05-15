<?php

namespace aeCorp\aec_src\aec_modules\aec_serviceclient\aec_services;

use aeCorp\aec_Core\ServiceCrud;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_src\aec_modules\aec_serviceclient\aec_models\ServiceclientModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class ServiceclientService extends ServiceCrud{

    public function __construct(ContainerInterface $container){
        Parent::__construct($container);
        $this->model=$this->container->get(ServiceclientModel::class);
        $this->modelImgVdPub = $container->get(ImagevideopubModel::class);
    }

    
   


}
