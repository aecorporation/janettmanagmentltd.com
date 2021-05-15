<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class NotificationMigration extends AbstractMigration
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
        if(!$this->hasTable("notification")){

        $this->table("notification", ["id"=>"id_notification"])
        ->addColumn("contenu_notification", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true, "comment"=>"Contenu de la notification"])
        ->addColumn("type_of_notification", "string", ["limit"=>30, "null"=>true, "comment"=>"Type de la notification"])
        ->addColumn("destinataire_notification", "string", ["limit"=>30, "null"=>true, "comment"=>"Destinataire de la notification"])
        ->addColumn("expediteur_notification", "string", ["limit"=>30, "null"=>true, "comment"=>"expéditeur de la notification"])
        ->addColumn("objetconcerne_notification", "string", ["limit"=>30, "null"=>true, "comment"=>"Objet concerné"])
        ->addColumn("dateview_notification", "integer", ["limit"=>1, "null"=>true, "comment"=>"date a laquelle la notification est vue"])
        ->addColumn("date_at_notification", "datetime", ["null"=>true, "comment"=>"Date de la notification"])
        ->create();
        }

    }
}
