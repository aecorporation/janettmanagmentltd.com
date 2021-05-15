<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class ServiceclientMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        if(!$this->hasTable("serviceclient")){

        $this->table("serviceclient", ["id"=>"id_serviceclient"])
        ->addColumn("menu_serviceclient", "string", ["limit"=>150, "null"=>true])
        ->addColumn("donnees_serviceclient", "string", ["limit"=>MysqlAdapter::PHINX_TYPE_JSON, "null"=>true])
        ->addColumn("date_at_image_serviceclient", "datetime", ["null"=>true])

        ->create();
        }

        
    }
}
