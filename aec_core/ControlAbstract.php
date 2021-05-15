<?php

namespace aeCorp\aec_core;

use aeCorp\aec_src\aec_modules\aec_historique\aec_controls\HistoriquePostControl;
use aeCorp\aec_src\aec_modules\ModuleTrait;
use aeCorp\aec_utils\aec_event\EventManager;
use aeCorp\aec_utils\aec_event\EventManagerInterface;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_session\FlashService;
use aeCorp\aec_utils\aec_router\RouterInterface;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_session\SessionInterface;
use aeCorp\aec_utils\aec_renderer\RendererInterface;
use aeCorp\aec_utils\aec_message\Message;

abstract class ControlAbstract 
{
    protected $container;
    protected $renderer;
    protected $session;
    protected $flash;
    protected $params;
    protected $message;
    protected $router;
    protected EventManagerInterface $eventManager;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->router = $this->container->get(RouterInterface::class);
        $this->message = Create::factory(Message::class, [$this->router->getLang()])();
        $this->session = $container->get(SessionInterface::class);
        $this->flash = $container->get(FlashService::class);
        $this->eventManager  = $container->get(EventManager::class);

        $this->renderer = $container->get(RendererInterface::class)
        ->viewPath(dirname(__DIR__).DIRECTORY_SEPARATOR."aec_src".DIRECTORY_SEPARATOR."aec_modules")
        ->setGlobal("message", $this->message)
        ->setGlobal("container", $container)
        ->setGlobal("renderer", $container->get(RendererInterface::class))
        ->setGlobal("router", $this->router)
        ->setGlobal("flash", $this->flash)
        ->setGlobal("session", $this->session)
        ->setFolder("aec_views");
    }

    use ModuleTrait;

    public function __invoke(RequestInterface $request)
    {
        if (!$request->getParam("action")) 
        {
            $method = "executeIndex";
        } else {
            $method = "execute" . ucfirst($request->getParam("action"));
        }
        if (method_exists($this, $method)) 
        {
            return $this->$method($request);
        } else {
            Response::send(200, "La methode est inconnue");
        }
    }

    /**
     * Inserer une historique
     */

    public function insertHistory(array $data = []){

        $historyPostControl = $this->container->get(HistoriquePostControl::class);
            $historyPostControl->executeSaveHistorique([     
                "id_historique"=>NULL,                   
                "titre_historique"=> $data["titre_historique"],
                "detailsobject_historique"=>$data["detailsobject_historique"],
                "foreignKey_historique"=>$data["foreignKey_historique"],
                "libele_historique"=> $data["libele_historique"],
                "type_historique"=>$data["type_historique"],
                "date_at_historique"=>$data["date_at_historique"],
                "auteur_historique"=>$data["auteur_historique"]
        ]);

    }
    

}