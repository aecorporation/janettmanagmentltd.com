<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_notification\aec_entities\Notification;
use aeCorp\aec_src\aec_modules\aec_notification\aec_tables\NotificationTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class NotificationModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(NotificationTable::class);
       
    }

    public function save(Notification $notification){

        $result = $this->table->insert($notification->arrayData());

        if(!$result instanceof PDOStatement){
           throw new OperationFailException("Insertion échouée");
        }

    }

    public function count(?array $data = []) : int{

        return !empty($data) ? $this->table->count($data) : $this->table->count();

    }

    public function findAll(?array $data = []){

        $res = !empty($data) ? $this->table->findAll($data) : $this->table->findAll(["order"=>["DESC", "id_notification"]]);

        $lists = $res->getHydrated() ?? [];
        
        return  $lists;

    }


    public function update(array $data) : bool{

        $result = $this->table->update($data);

        if($result instanceof PDOStatement){
            return true;
        }
            
        return false;

    }

    public function delete(?Notification $notification){

        $result = $this->table->delete(["id_notification='".$notification->getId_notification()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }

}
