<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class BlogMigration extends AbstractMigration
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

        if(!$this->hasTable("blog")){

        $this->table("blog", ["id"=>"id_blog"])
        ->addColumn("code_blog", "string", ["limit"=>30, "null"=>true])
        ->addColumn("titre_blog", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("soustitre_blog", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("details_blog", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("image_blog", "string", ["limit"=>150, "null"=>true])
        ->addColumn("menu_blog", "string", ["limit"=>50, "null"=>true])
        ->addColumn("date_at_blog", "datetime", ["null"=>true])

        ->addIndex("code_blog", ["unique"=>true, "name"=>"indexcode_blog"])

        ->create();

        }

    }
}
