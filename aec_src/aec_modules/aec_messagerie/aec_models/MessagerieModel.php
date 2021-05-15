<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_entities\Messagerie;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_tables\MessagerieTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use Exception;
use PDOStatement;

class MessagerieModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(MessagerieTable::class);
       
    }

    public function count(?array $data = []){

        return !empty($data) ? $this->table->count($data) : $this->table->count();

    }

    public function findAll(?array $data = []){

        $res = !empty($data) ? $this->table->findAll($data) : $this->table->findAll();

        $lists = $res->getHydrated() ?? [];
        
        return  $lists;

    }

    
    public function save(Messagerie $messagerie){

        $result = $this->table->insert($messagerie->arrayData());

        if(!$result instanceof PDOStatement)
            throw new OperationFailException("Opération échouée...");

    }

    public function update(array $data) : bool{

        $result = $this->table->update($data);

        if($result instanceof PDOStatement){
            return true;
        }
            
        return false;

    }

    public function delete(?Messagerie $messagerie){

        $result = $this->table->delete(["id_messagerie='".$messagerie->getId_messagerie()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }


}
