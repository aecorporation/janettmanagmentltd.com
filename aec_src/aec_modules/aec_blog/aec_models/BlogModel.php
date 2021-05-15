<?php

namespace aeCorp\aec_src\aec_modules\aec_blog\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_blog\aec_entities\Blog;
use aeCorp\aec_src\aec_modules\aec_blog\aec_tables\BlogTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class BlogModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(BlogTable::class);
    }

    public function saveBlog(blog $blog){

        $result = $this->table->insert($blog->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }

    } 

     /** Nombre slug de produit */
     public function countBlogs(?array $data){

        return $this->table->count($data);

    }

    public function updateBlog(Blog $blog){

        $result = $this->table->update(["data"=>$blog->arrayData(), "where"=>["code_blog=:code_blog"]]);

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }


    }

    public function findAll(?array $data = []){

        $res = !empty($data) ? $this->table->findAll($data) : $this->table->findAll();

        $lists = $res->getHydrated() ?? [];
        
        return  $lists;

    }

    public function delete(?Blog $blog){

        $result = $this->table->delete(["code_blog='".$blog->getCode_blog()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }

    


}
