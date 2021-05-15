<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class PrivilegeMigration extends AbstractMigration
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
        if(!$this->hasTable("privilege")){

        $this->table("privilege", ["id"=>"id_privilege"])
        ->addColumn("code_privilege", "string", ["limit"=>30, "null"=>true])
        ->addColumn("nom_privilege", "string", ["limit"=>50, "null"=>true])
        ->addColumn("details_privilege", "string", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])
        ->addColumn("parent_privilege", "string", ["limit"=>30, "null"=>true])
        ->addColumn("menus_privilege", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])
        ->addColumn("actions_privilege", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])

        ->addIndex("code_privilege", ["unique"=>true, "name"=>"indexPrivilege"])
        ->addIndex("nom_privilege", ["unique"=>true, "name"=>"indexNomPrivilege"])
        ->create();
        }
    }
}
