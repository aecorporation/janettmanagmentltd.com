<?php

namespace aeCorp\aec_src\aec_modules;

use aeCorp\aec_core\ControlAbstract;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models\ImagevideopubModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

abstract class ControlFront  extends ControlAbstract
{

    protected $categModel = null;
    protected $modelImgVdPub = null;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $this->modelImgVdPub = $container->get(ImagevideopubModel::class);
        $this->renderer->setFolder("views")->setLayout("layout.main")
        ->setGlobal("bg", $this->modelImgVdPub->findAll(["where"=>["type_imagevideopub='background'  
        AND etat_imagevideopub='Active'"]]))
        ;
        
    }


}