<?php

namespace aeCorp\aec_src\aec_modules\aec_realtimes\aec_controls;

use aeCorp\aec_src\aec_modules\aec_messagerie\aec_models\MessagerieModel;
use aeCorp\aec_src\aec_modules\aec_notification\aec_models\NotificationModel;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ControlFront;
use aeCorp\aec_utils\aec_request\RequestInterface;

class RealTimesControl extends ControlFront{

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);

        $this->modelNotify = $this->container->get(NotificationModel::class);

        $this->modelMsg = $this->container->get(MessagerieModel::class);

    }

    public function executeIndex(RequestInterface $request)
    {
        $countNotify =  $this->modelNotify->count(["dateview_notification IS NULL"]);

        $countMsg =  $this->modelMsg->count(["dateview_messagerie IS NULL"]);
       
        $datas = [
            "admin"=>[
                "connected"=>(isset($this->session["aec_USER_CODE_ADMIN_CONNECTED"]) && isset($this->session["ADMIN_CONNECTED"]))
            ],
            "notify" => [
                "nb"=>$countNotify
            ],
            "message" =>[
                "nb"=>$countMsg
                ]
        ];
    
                echo 'event:allNotify' . "\n";
                echo 'data:' . json_encode($datas) . "\n\n";
                echo 'retry:5000' . "\n";

    }


}