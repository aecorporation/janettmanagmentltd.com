<?php

use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_router\Router;
use aeCorp\aec_utils\aec_router\RouterInterface;
use aeCorp\aec_src\aec_specs\aec_renderer\aec_extensions\CsrfExtension;
use aeCorp\aec_src\aec_specs\aec_renderer\aec_extensions\FormatMoneyExtension;
use aeCorp\aec_utils\aec_event\EventManager;
use aeCorp\aec_utils\aec_renderer\RendererInterface;
use aeCorp\aec_utils\aec_request\Request;
use aeCorp\aec_utils\aec_renderer\RendererFactory;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_security\Security;
use aeCorp\aec_utils\aec_session\FlashService;
use aeCorp\aec_utils\aec_session\Session;
use aeCorp\aec_utils\aec_session\SessionInterface;

$this->set("ROOT", $_SERVER["DOCUMENT_ROOT"])
->set(ContainerInterface::class, $this)
->set(RequestInterface::class, Create::factory(Request::class))
->set(RouterInterface::class, Create::factory(Router::class, [$this->get(RequestInterface::class)]))
->set(SessionInterface::class,Create::factory(Session::class))
->set(FlashService::class, Create::factory(FlashService::class, [$this->get(SessionInterface::class)]))
->set("Security", Create::factory(Security::class))
->set(EventManager::class, EventManager::getInstance())


->set("folder.plugin.css", "/aec_public/aec_plugin/aec_css/")
->set("folder.plugin.js", "/aec_public/aec_plugin/aec_js/")
->set("folder.icon", "/aec_public/aec_icon/")
->set("folder.vuejs", "/aec_public/aec_vuejs/")

->set("folder.img", ($this->get(RouterInterface::class)->getLang()!==null) ? "/aec_public/aec_vuejs/aec_dist/aec_img/".
        $this->get(RouterInterface::class)->getLang()."_":"/aec_public/aec_vuejs/aec_dist/aec_img/"
)
// Renderer
->set("folder", dirname(__DIR__) . "/aec_views/")
->set(RendererInterface::class, 
        Create::factory(RendererFactory::class)($this)->setExtension("CsrfExtension", Create::factory(CsrfExtension::class)())
                        ->setExtension("FormatMoneyExtension", Create::factory(FormatMoneyExtension::class))
                        ->setExtension("request", Create::factory(Request::class))
                        ->setExtension("Security", $this->get("Security"))
)
;

$confiData = [

        
        
        "root.plugin.css" => $this->get("ROOT") .  $this->get("folder.plugin.css"),
        "root.plugin.js" => $this->get("ROOT") .  $this->get("folder.plugin.js"),

        "root.css" => $this->get("ROOT") .  $this->get("folder.vuejs"),
        "root.js" => $this->get("ROOT") .  $this->get("folder.vuejs"),

        "root.icon" => $this->get("ROOT") .  $this->get("folder.icon"),
        "root.img" => $this->get("ROOT") .  $this->get("folder.img"),


        "css.plugins"=>[

            //"boostrap/bootstrap.css",
            //"boostrap/bootstrap.min.css",
           // "jquery_confirm/jquery-confirm.css",
            //"lightbox/lightbox.css",
            //"fontawesome-5.12.1/css/all.css",

        ],

        "js.plugins"=>[

             //"jquery/jquery-3.4.1.min.js",
            // "tinymce/jquery.tinymce.min.js",
            //"tinymce/tinymce.min.js",
            // "boostrap/bootstrap.min.js",
             //"jquery_confirm/jquery-confirm.min.js",
            // "lightbox/lightbox-2.6.min.js",
            // "aecjs/ae.js"
        ],


];

return $confiData;
