<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class MenuitemsMigration extends AbstractMigration
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

        if(!$this->hasTable("menuitems")){

        $this->table("menuitems", ["id"=>"id_menuitems"])
        ->addColumn("code_menuitems", "string", ["limit"=>30, "null"=>true])
        ->addColumn("titre_menuitems", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("soustitre_menuitems", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("details_menuitems", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("image_menuitems", "string", ["limit"=>150, "null"=>true])
        ->addColumn("menu_menuitems", "string", ["limit"=>50, "null"=>true])
        ->addColumn("children_menuitems", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("type_menuitems", "string", ["limit"=>30, "null"=>true])
        ->addColumn("date_at_menuitems", "datetime", ["null"=>true])

        ->addIndex("code_menuitems", ["unique"=>true, "name"=>"indexcode_menuitems"])

        ->create();

        }

    }
}
