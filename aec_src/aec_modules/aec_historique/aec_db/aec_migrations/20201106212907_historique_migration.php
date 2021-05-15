<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class HistoriqueMigration extends AbstractMigration
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
        if(!$this->hasTable("historique")){

        $this->table("historique", ["id"=>"id_historique"])
        ->addColumn("titre_historique", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true, "comment"=>"Titre expicatif de l'historique"])
        ->addColumn("detailsobject_historique", "string", ["limit"=>MysqlAdapter::TEXT_LONG, "null"=>true, "comment"=>"L'Object json de tout object de l'application de l'historique"])
        ->addColumn("foreignKey_historique", "string", ["limit"=>50, "null"=>true, "comment"=>"La clé relatif a l'element modifiée de l'historique"])
        ->addColumn("libele_historique", "string", ["limit"=>50, "null"=>true, "comment"=>"Titre de l'historique"])
        ->addColumn("type_historique", "string", ["limit"=>50, "null"=>true, "comment"=>"Enregistrement, Modification, supprimer, Selectionner"])
        ->addColumn("date_at_historique", "datetime", ["null"=>true, "comment"=>"Date de l'historique"])
        ->addColumn("auteur_historique", "string", ["limit"=>30, "null"=>true, "comment"=>"Celui qui a fait l'action"])

        ->create();

        }

    }
}
