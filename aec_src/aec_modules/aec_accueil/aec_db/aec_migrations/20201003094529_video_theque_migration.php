<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class VideoThequeMigration extends AbstractMigration
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
        if(!$this->hasTable("playlist")){

        $this->table("playlist", ["id"=>"id_playlist"])
        ->addColumn("code_playlist", "string", ["limit"=>30, "null"=>true, "comment"=>"Code de la playlist"])
        ->addColumn("lien_playlist", "string", ["limit"=>225, "null"=>true, "comment"=>"Lien de la playlist"])
        ->addColumn("titre_playlist", "string", ["limit"=>225, "null"=>true,  "comment"=>"titre de la playlist"])
        ->addColumn("soustitre_playlist", "string", ["limit"=>225, "null"=>true,  "comment"=>"Sous-titre de la playlist"])
        ->addColumn("details_playlist", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM,  "comment"=>"Détails de la playlist"])
        ->addColumn("slug_playlist", "string", ["limit"=>30,  "comment"=>"Slug de la playlist"])

        ->addIndex("code_playlist", ["unique"=>true, "name"=>"indexPlaylist"])

        ->create();
        }
    }
}
