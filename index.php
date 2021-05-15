<?php

declare(strict_types =1);
//ini_set('display_errors', "Off");
//ini_set('display_errors', 'Off'); 

// session_start();
//    $AUTH_USER = 'aecCorp';
//   	$AUTH_PASS = 'ADM.aeCorp';
//   	header('Cache-Control: no-cache, must-revalidate, max-age=0');
//   	$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
//   	$is_not_authenticated = (
//   		!$has_supplied_credentials ||
//   		$_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
//   		$_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
//   	);
//   	if ($is_not_authenticated) {
//   		header('HTTP/1.1 401 Authorization Required');
//   		header('WWW-Authenticate: Basic realm="Access denied"');
//   		exit;
//   	}

 
use aeCorp\aec_src\App;
use aeCorp\aec_core\Autoload;
use aeCorp\aec_src\aec_modules\aec_admin\AdminModule;
use aeCorp\aec_src\aec_modules\aec_accueil\AccueilModule;
use aeCorp\aec_src\aec_modules\aec_admin\aec_config\RouterPrefixAdminMiddleware;
use aeCorp\aec_src\aec_modules\aec_messagerie\MessagerieModule;
use aeCorp\aec_src\aec_modules\aec_blog\blogModule;
use aeCorp\aec_src\aec_modules\aec_emailsender\EmailsenderModule;
use aeCorp\aec_src\aec_modules\aec_historique\HistoriqueModule;
use aeCorp\aec_src\aec_modules\aec_serviceclient\ServiceclientModule;
use aeCorp\aec_src\aec_modules\aec_loginadmin\LoginAdminModule;
use aeCorp\aec_src\aec_modules\aec_notification\NotificationModule;
use aeCorp\aec_src\aec_modules\aec_imagevideopub\ImagevideopubModule;
use aeCorp\aec_src\aec_modules\aec_menuitems\MenuitemsModule;
use aeCorp\aec_src\aec_modules\aec_realtimes\RealtimesModule;
use aeCorp\aec_src\aec_modules\aec_useradmin\UserAdminModule;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_factory\Container;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_src\aec_specs\aec_middlewares\ForBiddenMiddleware;

use aeCorp\aec_utils\aec_middlewares\{
CsrfMiddleware,
RemoveSlashUrl,
RouterMiddleware,
DispatcherMiddleware,
    LengthDataMiddleware,
    NotFoundUrl,
    RouterPrivilegeMiddleware
};

// Charger l'autoloader...
//require dirname(__DIR__)."/aec_core/Autoload.php";
//Autoload::LOADER();

//Autoloader de composer

$root = __DIR__;

require $root."/vendor/autoload.php";

// Creer l'application
$app = Create::factory(App::class)

// Ajouter les dependances function neccessaire pour le fonctionnement de l'application
->addDependancy(ContainerInterface::class, Create::factory(Container::class,[
                        [
                         $root . DIRECTORY_SEPARATOR . "aec_config" . DIRECTORY_SEPARATOR . "config.php",
                         $root . DIRECTORY_SEPARATOR . "aec_src" . DIRECTORY_SEPARATOR ."aec_specs" . DIRECTORY_SEPARATOR ."aec_config" . DIRECTORY_SEPARATOR . "config.php"
                        ]
                    ])
                )
->addModule(AdminModule::class)
->addModule(ImagevideopubModule::class)
->addModule(AccueilModule::class)
->addModule(ServiceclientModule::class)
->addModule(blogModule::class)
->addModule(MenuitemsModule::class)

->addModule(LoginAdminModule::class)
->addModule(UserAdminModule::class)
->addModule(MessagerieModule::class)
->addModule(NotificationModule::class)
->addModule(HistoriqueModule::class)
->addModule(RealtimesModule::class)
->addModule(EmailsenderModule::class)

//Demarrer l'application

->pipe(RemoveSlashUrl::class)
->pipe(ForBiddenMiddleware::class)
->pipe(LengthDataMiddleware::class)
->pipe(CsrfMiddleware::class)

// Admin
    ->pipe(RouterPrefixAdminMiddleware::class)
->pipe(RouterMiddleware::class)
->pipe(RouterPrivilegeMiddleware::class)
->pipe(DispatcherMiddleware::class)
->pipe(NotFoundUrl::class);

if(php_sapi_name()!=="cli"){
    $app->run();
    return;
}