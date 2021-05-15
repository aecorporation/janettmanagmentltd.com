<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class UseradminMigration extends AbstractMigration
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
        if(!$this->hasTable("useradmin")){

        $this->table("useradmin", ["id"=>"id_useradmin"])
        ->addColumn("code_useradmin", "string", ["limit"=>30, "null"=>true])
        ->addColumn("image_useradmin", "string", ["limit"=>150, "null"=>true])
        ->addColumn("piece_useradmin", "string", ["limit"=>150, "null"=>true, "comment"=>"Image de CNI, PASSEPORT, ETC..."])
        ->addColumn("numpiece_useradmin", "string", ["limit"=>50, "null"=>true, "comment"=>"Numero de la piece d'identité"])
        ->addColumn("nom_useradmin", "string", ["limit"=>50, "null"=>true])
        ->addColumn("prenoms_useradmin", "string",  ["limit"=>100, "null"=>true])
        ->addColumn("dateNais_useradmin", "date",["null"=>true])
        ->addColumn("lieuNais_useradmin", "string", ["limit"=>100, "null"=>true])
        ->addColumn("sexe_useradmin", "string", ["limit"=>1, "null"=>true])
        ->addColumn("sitMatr_useradmin", "string", ["limit"=>30, "null"=>true])
        ->addColumn("nbenf_useradmin", "integer", ["limit"=>3, "null"=>true, "comment"=>"Nombre d'enfant"])
        ->addColumn("contact_useradmin", "string", ["limit"=>50, "null"=>true])
        ->addColumn("email_useradmin", "string", ["limit"=>100, "null"=>true])
        ->addColumn("adresse_useradmin", "string", ["limit"=>100, "null"=>true])
        ->addColumn("bp_useradmin", "string", ["limit"=>100, "null"=>true])
        ->addColumn("pays_useradmin", "string", ["limit"=>50, "null"=>true])
        ->addColumn("ville_useradmin", "string", ["limit"=>50, "null"=>true])
        ->addColumn("quartier_useradmin", "string", ["limit"=>80, "null"=>true])
        ->addColumn("login_useradmin", "string", ["limit"=>50, "null"=>true])
        ->addColumn("loginC_useradmin", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("mdp_useradmin", "string", ["limit"=>50, "null"=>true])
        ->addColumn("mdpC_useradmin", "string", ["limit"=>MysqlAdapter::TEXT_REGULAR, "null"=>true])
        ->addColumn("codePrivilege_useradmin", "string", ["limit"=>30, "null"=>true])
        ->addColumn("menusForbiden_useradmin", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])
        ->addColumn("actionsForbiden_useradmin", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])
        
        ->addColumn("menusAuthorised_useradmin", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])
        ->addColumn("actionsAuthorised_useradmin", "text", ["limit"=>MysqlAdapter::TEXT_MEDIUM, "null"=>true])

        ->addColumn("etat_useradmin", "integer", ["limit"=>1, "null"=>true])

        ->addIndex("code_useradmin", ["unique"=>true, "name"=>"indexCodeUseradmin"])
        ->addIndex("email_useradmin", ["unique"=>true, "name"=>"indexEmailUseradmin"])
        ->addIndex("contact_useradmin", ["unique"=>true, "name"=>"indexContactUseradmin"])
        ->addIndex("login_useradmin", ["unique"=>true, "name"=>"indexLoginUseradmin"])
        ->addIndex("loginC_useradmin", ["unique"=>true, "name"=>"indexLoginCUseradmin"])

        ->addForeignKey("codeprivilege_useradmin", "privilege", "code_privilege",
        [
            "delete"=>"SET_NULL", 
            "update"=>"NO_ACTION"
        ]
    )
    ->create();
        
    }

    }
}
