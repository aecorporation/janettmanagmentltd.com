<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class ExpositionMigration extends AbstractMigration
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
        if(!$this->hasTable("expostion")){

        $this->table("expostion", ["id"=>"id_expos"])
        ->addColumn("code_expos", "string", ["limit"=>225, "null"=>true,  "comment"=>"Code de l'exposition"])
        ->addColumn("image_expos", "string", ["limit"=>225, "null"=>true,  "comment"=>"Image de l'exposition"])
        ->addColumn("titre_expos", "string", ["limit"=>225, "null"=>true,  "comment"=>"Titre de l'exposition"])
        ->addColumn("soustitre_expos", "string", ["limit"=>225, "null"=>true,  "comment"=>"Sous-titre de l'exposition"])
        ->addColumn("prix_expos", "float", ["limit"=>10, "null"=>true,  "comment"=>"prix article de l'exposition"])
        ->addColumn("details_expos", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM,  "comment"=>"Details de l'article de l'exposition"])

        ->addIndex("code_expos", ["unique"=>true, "name"=>"indexExposition"])

        ->create();
        }
    }
}
