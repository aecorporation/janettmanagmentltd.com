<?php

//namespace
namespace aeCorp\aec_src\aec_modules\aec_historique;

// classes importées

use aeCorp\aec_src\aec_modules\aec_historique\aec_controls\HistoriqueGetControl;
use aeCorp\aec_src\aec_modules\aec_historique\aec_controls\HistoriquePostControl;
use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_src\aec_modules\ModulesAbstract;
use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_modules\aec_historique\aec_subscribers\HistoriqueEventSubscriber;

/**
 * Tous les modules heritent de ModulesAbstract
 */
class HistoriqueModule extends ModulesAbstract
{
    use ModuleTrait;

    // Definition si necessaire de fichier de configuration spécifique
    const DEFINITION = [__DIR__ . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php"];
    const MIGRATION = __DIR__ . DIRECTORY_SEPARATOR . "aec_db" . DIRECTORY_SEPARATOR . "aec_migrations";
    const SEED = __DIR__ . DIRECTORY_SEPARATOR . "aec_db" . DIRECTORY_SEPARATOR . "aec_seeds";
    
    // Definition des routes relatives au module de l'application
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $this->eventManager->addEventSubscriber($this->container->get(HistoriqueEventSubscriber::class));

        //Historique
        $this->router->get($this->container->get("admin.prefix")."/historique/gestion/action:createHistorique", HistoriqueGetControl::class, ["name"=>"admin.historique.createHistorique", "title"=>"Creer Historique", "description"=>"Gestion de Historiques"]);
        //Actions
        $this->router->post($this->container->get("admin.prefix")."/historique/gestion/action:saveHistorique", HistoriquePostControl::class, ["name"=>"admin.historique.createHistorique.post.saveHistorique", "description"=>"Enregistrer un Historique"]);
        $this->router->post($this->container->get("admin.prefix")."/historique/gestion/action:searchHistorique", HistoriquePostControl::class, ["name"=>"admin.historique.createHistorique.post.searchHistorique", "description"=>"Rechercher un Historique"]);
        $this->router->post($this->container->get("admin.prefix")."/historique/gestion/action:deleteHistorique", HistoriquePostControl::class, ["name"=>"admin.historique.createHistorique.post.deleteHistorique", "description"=>"Suprimer un Historique"]);

    }

}
