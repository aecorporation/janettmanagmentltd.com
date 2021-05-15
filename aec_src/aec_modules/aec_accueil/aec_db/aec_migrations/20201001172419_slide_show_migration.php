<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SlideShowMigration extends AbstractMigration
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
    public function change()
    {
        if(!$this->hasTable("slideshow")){

            $this->table("slideshow", ["id"=>"id_slide"])
            ->addColumn("code_slide", "string", ["limit"=>30, "null"=>true,  "comment"=>"Code du slideshow"])
            ->addColumn("image_slide", "string", ["limit"=>150, "null"=>true,  "comment"=>"Image du slideshow"])
            ->addColumn("titre_slide", "string", ["limit"=>250, "null"=>true,  "comment"=>"Titre du slideshow"])
            ->addColumn("details_slide", "string", ["limit"=>150, "null"=>true,  "comment"=>"Détails du slideshow"])
            ->addColumn("lien_slide", "string", ["limit"=>150, "null"=>true,  "comment"=>"Lien du slideshow"])
    
            ->addIndex("code_slide", ["unique"=>true, "name"=>"indexSlideshow"])
    
            ->create();

        }
       

    }

}
