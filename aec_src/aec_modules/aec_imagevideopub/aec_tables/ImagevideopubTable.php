<?php

namespace aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_entities\Imagevideopub;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class ImagevideopubTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Imagevideopub::class;
    }
}
