<?php

namespace aeCorp\aec_src\aec_modules\aec_notification\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_notification\aec_entities\Notification;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class NotificationTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Notification::class;
    }
}
