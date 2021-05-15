<?php

namespace aeCorp\aec_src\aec_modules\aec_blog\aec_tables;

use aeCorp\aec_core\TableAbstract;
use aeCorp\aec_src\aec_modules\aec_blog\aec_entities\Blog;
use aeCorp\aec_utils\aec_factory\ContainerInterface;

class BlogTable  extends TableAbstract
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->entity = Blog::class;
    }
}
