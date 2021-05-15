<?php


namespace aeCorp\aec_src\aec_modules\aec_admin\aec_config;

use aeCorp\aec_core\ModelAbstract;
use aeCorp\aec_src\aec_modules\aec_loginadmin\aec_models\LoginAdminModel;
use aeCorp\aec_utils\aec_checkerrors\Error;
use aeCorp\aec_utils\aec_factory\Create;
use aeCorp\aec_utils\aec_request\RequestInterface;
use aeCorp\aec_utils\aec_middlewares\MiddlewareInterface;

class LoginAdminMiddleware implements MiddlewareInterface
{
    private ?ModelAbstract $model=null;

    public function __construct(LoginAdminModel $model)
    {
        $this->model = $model;
    }
    public function process(RequestInterface $request, MiddlewareInterface $middleware)
    {
        $user = $this->model->user();
        if ($user===null) {
           throw new LoginAdminException((string)Create::factory(Error::class, ["noAccess", "noAccess"]), 1);
        }
        return $middleware->process($request->setParams(["user"=> $user]), $middleware);
        
    }
}