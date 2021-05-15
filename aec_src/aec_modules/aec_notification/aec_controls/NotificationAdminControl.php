<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_admin\ControlBack;
use aeCorp\aec_src\aec_modules\aec_notification\aec_models\NotificationModel;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_security\Security;

class NotificationAdminControl extends ControlBack
{
    
public function __construct(ContainerInterface $container)
{
        parent::__construct($container);
        //Instancier les modules
        $this->model = $this->container->get(NotificationModel::class);
}

public function executeIndex(RequestInterface $request)
{
        $notificatios =  $this->model->findAll();

        $this->model->update(["data"=>["dateview_notification"=>date("Y-m-d H:i:s")], "where"=>["dateview_notification IS NULL"]]);

        return Response::send(200, $this->renderer->render("notification.admin.list_notification", [
            "notifications"=>$notificatios
        ]));
}

    
public function executeSearchNotification(RequestInterface $request){

    $data = Security::sanitize($request->formData());

    $criteres = $this->createCritere($data);

    return Response::send(200, $this->renderer->render("notification.admin.list_notification",[
        "notifications"=>$this->model->findAll(["where"=>$criteres])
    ]));
}


private function createCritere($data = []){

    $where[] = !empty($data["dateD"]) ? "date_at_notification >= '".$data["dateD"]."'" :"";
    $where[] = !empty($data["dateA"]) ? "date_at_notification <= '".$data["dateA"]."'" :"";

    return array_filter($where, fn($item)=> $item !== "");
}


}
