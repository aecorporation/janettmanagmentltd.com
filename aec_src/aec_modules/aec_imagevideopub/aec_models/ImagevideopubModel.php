<?php

namespace aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_models;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_entities\Imagevideopub;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\aec_tables\ImagevideopubTable;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use PDOStatement;

class ImagevideopubModel extends ModelAbstract
{

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->table = $this->container->get(ImagevideopubTable::class);
    }

    public function saveImagevideopub(Imagevideopub $Imagevideopub){

        $result = $this->table->insert($Imagevideopub->arrayData());

        if($result instanceof PDOStatement){
            return true;
        }else{
            return false;
        }

    } 

     /** Nombre slug de produit */
     public function countImagevideopubs(?array $data){

        return $this->table->count($data);

    }

    public function updateImagevideopub(Imagevideopub $Imagevideopub){

        $result = $this->table->update(["data"=>$Imagevideopub->arrayData(), "where"=>["code_imagevideopub=:code_imagevideopub"]]);

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

    public function delete(?Imagevideopub $Imagevideopub){

        $result = $this->table->delete(["code_imagevideopub='".$Imagevideopub->getCode_imagevideopub()."'"]);

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }

    


}
