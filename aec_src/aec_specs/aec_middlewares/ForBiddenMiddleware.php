<?php


namespace aeCorp\aec_src\aec_specs\aec_middlewares;

use aeCorp\aec_src\aec_modules\aec_admin\aec_config\LoginAdminException;
use aeCorp\aec_src\aec_modules\aec_profilclient\aec_config\LoginProfilClientException;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\Response;
use aeCorp\aec_utils\aec_session\FlashService;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_session\SessionInterface;
use aeCorp\aec_utils\aec_checkerrors\CsrfException;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;
use aeCorp\aec_utils\aec_checkerrors\FileNotFoundException;
use aeCorp\aec_utils\aec_checkerrors\LengthDataException;
use aeCorp\aec_utils\aec_factory\ContainerInterface;
use aeCorp\aec_utils\aec_middlewares\PrivilegeException;

class ForBiddenMiddleware implements MiddlewareInterface
{
    private $loginPath;
    private $container;
    private $session;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->session = $container->get(SessionInterface::class);
    }

   
    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {
        try{
            return $middleware->process($request, $middleware);
        }
        catch(LengthDataException $e)
        {
            return Response::send(200, $e->getMessage());

        } catch (LoginAdminException $e) {
            //Create::factory(FlashService::class, [$this->session])->error($e->getMessage());
            return Response::redirect($this->container->get("login.admin"));
        } 
        catch (LoginProfilClientException $e) {
            return Response::redirect($this->container->get("login.client"));
        }
        catch (PrivilegeException $e) {
            return Response::sendJson(200, ["status"=>0, "msg"=>"Interdit d'acces"]);
        }

        catch (CsrfException $e) 
        {
            return Response::sendJson(200, ["status"=>0, "msg"=>$e->getMessage()]);

        } catch (FileNotFoundException $e) {
            return Response::send(200, $e->getMessage());

        } /*catch (\Exception $e) {
            return Response::send(200, $e->getMessage());
        }*/






    }

}
