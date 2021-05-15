<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class ImageVideoPubMigration extends AbstractMigration
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

        if(!$this->hasTable("imagevideopub")){

        $this->table("imagevideopub", ["id"=>"id_imagevideopub"])
        ->addColumn("code_imagevideopub", "string", ["limit"=>30, "null"=>true])
        ->addColumn("titre_imagevideopub", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("soustitre_imagevideopub", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("details_imagevideopub", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("fichier_imagevideopub", "string", ["limit"=>150, "null"=>true])
        ->addColumn("menu_imagevideopub", "string", ["limit"=>50, "null"=>true])
        ->addColumn("position_imagevideopub", "string", ["limit"=>30, "null"=>true])
        ->addColumn("type_imagevideopub", "string", ["limit"=>30, "null"=>true])
        ->addColumn("typefile_imagevideopub", "string", ["limit"=>30, "null"=>true])
        ->addColumn("etat_imagevideopub", "string", ["limit"=>30, "null"=>true])
        ->addColumn("focus_imagevideopub", "string", ["limit"=>30, "null"=>true])
        ->addColumn("date_at_imagevideopub", "datetime", ["null"=>true])

        ->addIndex("code_imagevideopub", ["unique"=>true, "name"=>"indexcode_imagevideopub"])

        ->create();

        }

    }
}
