<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_controls;

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\ControlFront;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_request\Response;

class NotificationControl extends ControlFront{

    public function __construct(ContainerInterface $container)
    {
        Parent::__construct($container);
    }

    public function executeIndex(RequestInterface $request){
        return Response::send(200, $this->renderer->render("notification.index", [
        ], true));
    }


}