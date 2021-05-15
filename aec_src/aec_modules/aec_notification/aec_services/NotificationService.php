<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_services;

use aeCorp\aec_core\ServiceCrud;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_notification\aec_entities\Notification;
use aeCorp\aec_src\aec_modules\aec_notification\aec_models\NotificationModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class NotificationService extends ServiceCrud{

public function __construct(ContainerInterface $container) {

    parent::__construct($container);

    $this->model = $this->container->get(NotificationModel::class);

}

public function save(Notification $notification)
{
    try{

        $result = $this->model->save($notification);

    }catch(OperationFailException $e){

        throw new OperationFailException($e->getMessage());
        
    }

}

}