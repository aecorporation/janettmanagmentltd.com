<?php

namespace aeCorp\aec_src\aec_modules\aec_useradmin\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Useradmin;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class UseradminTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Useradmin::class;
    }

    public function findAllJoin(?array $data= null){

        $res = [];

        $res = $this->builder
        ->from("useradmin")
        ->join("privilege","useradmin.codePrivilege_useradmin = privilege.code_privilege", "LEFT")
        ->join("historique","useradmin.code_useradmin = foreignKey_historique", "LEFT");

        if(!is_null($data)){
            foreach($data["where"] as $w){
                $this->builder->where($w);
            }
        }

        $res = $this->builder
        ->order("DESC", "historique.date_at_historique")
        ->group("code_useradmin")
        ->objectAll();
        $this->builder->reset();

        return $res;
        
    }

}
 