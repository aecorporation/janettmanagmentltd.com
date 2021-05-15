<?php
namespace aeCorp\aec_src\aec_tests\aec_modules\aec_produits;

use aeCorp\aec_src\aec_modules\aec_produits\aec_tables\CategorieTable;
use aeCorp\aec_utils\aec_factory\Container;
use aeCorp\aec_utils\aec_factory\Create;
use PHPUnit\Framework\TestCase;

class CategorieModelTest extends TestCase
{

    public function testselectWithSousCatege(){

        $container = Create::factory(Container::class);
        $this->table = $container->get(CategorieTable::class);

    }

}