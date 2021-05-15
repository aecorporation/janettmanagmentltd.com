<?php

namespace aeCorp\aec_src\aec_modules\aec_loginadmin\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Useradmin;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_models\UseradminModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class LoginAdminModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
       
    }

    
    public function connect(Useradmin $useradmin) : ?Useradmin
    {
      //  return $table;
     $user =  $this->container->get(UseradminModel::class)->find(["where"=>["loginC_useradmin ='".$useradmin->getLoginC_useradmin()."'", "mdpC_useradmin='".$useradmin->getMdpC_useradmin()."'",  "etat_useradmin='1'"]]);
    
        if($user){
            $this->session["aec_USER_CODE_ADMIN_CONNECTED"] = $user->getCode_useradmin();
            return  $user;
        }else{
            return null;
        }
    }

    public function user() : ?Useradmin
    {
        $code = $this->session["aec_USER_CODE_ADMIN_CONNECTED"] ?? null;
        if($code==null){
            return null;
        }

        $user =  $this->container->get(UseradminModel::class)->findwithprivilege(["where"=>["code_useradmin ='".$code."'", "etat_useradmin='1'"]]);
        
        if($user){

            $this->session["ADMIN_CONNECTED"] = $user;
            return $user;
        }
        return  null;
    }


}
