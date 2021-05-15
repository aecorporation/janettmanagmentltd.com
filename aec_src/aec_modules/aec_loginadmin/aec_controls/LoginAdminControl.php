<?php

namespace aeCorp\aec_src\aec_modules\aec_loginadmin\aec_controls;

use aeCorp\aec_src\aec_modules\aec_loginadmin\aec_models\LoginAdminModel;
use aeCorp\aec_src\aec_modules\aec_loginadmin\ControlLoginAdmin;
use aeCorp\aec_src\aec_modules\aec_useradmin\aec_entities\Useradmin;
use aeCorp\aec_utils\aec_checkerrors\Validator;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class LoginAdminControl extends ControlLoginAdmin{

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);

        $this->model = $container->get(LoginAdminModel::class);
    }

    public function executeIndex(RequestInterface $request){

        return Response::send(200, $this->renderer->render("loginadmin.index", [], true));
    }

    public function executeConnect(RequestInterface $request){

        $data = Security::sanitize($request->formData());

         $validator = Create::factory(Validator::class, [$data]);

        $validator->noEmpty("login_useradmin", "mdp_useradmin=>mot de passe");
        
        if(count($validator->getErrors())>0) {
            return Response::send(200, \json_encode(["status"=>0, "msg"=>$validator->getErrors()] ));
        }

        $data["loginC_useradmin"] = md5(base64_encode("WGEHDKDKKD2020".$data["login_useradmin"]."WGEHDKDKKD2020"));
        $data["mdpC_useradmin"] = md5(base64_encode("WGEHDKDKKD2020".$data["mdp_useradmin"]."WGEHDKDKKD2020"));

        $user = Create::factory(Useradmin::class, [$data]);

        $useradmin = $this->model->connect($user);

        if($useradmin!==null){
            return Response::send(200, \json_encode(["status" => 1, "msg" => "Connexion réussie"]));
        }else{
            return Response::send(200, \json_encode(["status" => 0, "msg" => "parametres incorects"]));

        }

    }



  

}