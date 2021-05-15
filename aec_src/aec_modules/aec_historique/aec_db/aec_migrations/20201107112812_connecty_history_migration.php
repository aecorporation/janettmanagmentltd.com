<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ConnectyHistoryMigration extends AbstractMigration
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
        if(!$this->hasTable("connectyhistory")){

        $this->table("connectyhistory")
        ->addColumn("dateconnect", "datetime", ["null"=>true, "comment"=>"Date et heure connexion"])
        ->addColumn("datedisconnect", "datetime", ["null"=>true, "comment"=>"Date et heure deconnexion"])
        ->addColumn("statusconnect", "integer", ["limit"=>1, "null"=>true, "comment"=>"1 =>Connecté et 0=>Déconnecté"])
        ->addColumn("userconnected", "string", ["limit"=>30, "null"=>true, "comment"=>"Administrateur ou utilisateur"])

        ->create();

        }

    }
}
