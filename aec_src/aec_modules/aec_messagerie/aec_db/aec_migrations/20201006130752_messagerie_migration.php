<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class MessagerieMigration extends AbstractMigration
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
        if(!$this->hasTable("messagerie")){

        $this->table("messagerie", ["id"=>"id_messagerie"])
        ->addColumn("expediteur_messagerie", "string", ["limit"=>50, "null"=>true, "comment"=>"code expéditeur"])
        ->addColumn("email_messagerie", "string", ["limit"=>255, "null"=>true, "comment"=>"Email expéditeur"])
        ->addColumn("mobile_messagerie", "string", ["limit"=>50, "null"=>true, "comment"=>"Mobile expéditeur"])
        ->addColumn("phone_messagerie", "string", ["limit"=>50, "null"=>true, "comment"=>"Phone expéditeur"])
        ->addColumn("ville_messagerie", "string", ["limit"=>30, "null"=>true, "comment"=>"Ville expéditeur"])
        ->addColumn("pays_messagerie", "string", ["limit"=>30, "null"=>true, "comment"=>"Pays expéditeur"])
        ->addColumn("destinataire_messagerie", "string", ["limit"=>50, "null"=>true, "comment"=>"code destinataire"])
        ->addColumn("objet_messagerie", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true, "comment"=>"Objet du message"])
        ->addColumn("contenu_messagerie", "string", ["limit"=>30, "null"=>true, "comment"=>"Contenu du message"])
        ->addColumn("dateview_messagerie", "string", ["limit"=>10, "null"=>true, "comment"=>"date de la lecture du message"])
        ->addColumn("date_at_messagerie", "datetime", ["null"=>true, "comment"=>"Date de l'envoi ou de la reception du message"])
        ->addColumn("compagnie_messagerie", "datetime", ["null"=>true])
        ->create();

        }
    }
}
