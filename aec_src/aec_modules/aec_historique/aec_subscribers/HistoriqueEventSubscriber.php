<?php

namespace aeCorp\aec_src\aec_modules\aec_historique\aec_subscribers;

use aeCorp\aec_src\aec_modules\aec_commandes\aec_events\NewCommandeCreatedEvent;
use aeCorp\aec_src\aec_modules\aec_errors\OperationFailException;
use aeCorp\aec_src\aec_modules\aec_historique\aec_entities\Historique;
use aeCorp\aec_src\aec_modules\aec_historique\aec_services\HistoriqueService;
use aeCorp\aec_src\aec_modules\aec_newsletter\aec_events\NewProductCreatedEvent;
use aeCorp\aec_src\aec_modules\aec_newsletter\aec_events\NewProductUpdatedEvent;
use aeCorp\aec_src\aec_modules\aec_produits\aec_events\NewDeclinaisonCreatedEvent;
use aeCorp\aec_src\aec_modules\aec_produits\aec_events\NewDeclinaisonUpdatedEvent;
use aeCorp\aec_utils\aec_event\EventInterface;
use aeCorp\aec_utils\aec_event\EventSubscriberInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;

class HistoriqueEventSubscriber  implements EventSubscriberInterface{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->service = $this->container->get(HistoriqueService::class);
    }

    public function getEvents() : array {

        return [
            NewCommandeCreatedEvent::class=>["createHistorique"],
            NewDeclinaisonCreatedEvent::class=>["createHistorique"],
            NewProductCreatedEvent::class=>["createHistorique"],
            NewDeclinaisonUpdatedEvent::class=>["createHistorique"],
            NewProductUpdatedEvent::class=>["createHistorique"],
        ];

    }

    public function createHistorique(EventInterface $event){

        $historique = Create::factory(Historique::class, [$event->getTarget()->history]);

        try{

            $this->service->save($historique);

        }catch(OperationFailException $e){

            echo $e->getMessage();

        }



    }


}