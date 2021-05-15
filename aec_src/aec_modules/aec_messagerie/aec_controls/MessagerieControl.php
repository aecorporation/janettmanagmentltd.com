<?php

namespace aeCorp\aec_src\aec_modules\aec_messagerie\aec_controls;

use aeCorp\aec_src\aec_modules\aec_errors\NotDataConformException;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_messagerie\aec_services\MessagerieService;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ControlFront;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;
use Exception;

class MessagerieControl extends ControlFront{

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);
        $this->service = $this->container->get(MessagerieService::class);
    }

    public function executeSendMessage(RequestInterface $request){
       
    $data = Security::sanitize($request->formData());

    try{

        $this->service->createMessage($data);

        return Response::sendJson(200, [
            "status"=>1, 
            "msg"=>"Opération réussie"
        ]);

    }catch(NotDataConformException $e){
        return Response::sendJson(200, ["status"=>0, "msg"=>$e->getMessage()]);
    }catch(OperationFailException $e){
        return Response::sendJson(200, ["status"=>0, "msg"=>$e->getMessage()]);
    }catch(Exception $e){
        return Response::sendJson(200, ["status"=>0, "msg"=>$e->getMessage()]);
    }
       



    }



}