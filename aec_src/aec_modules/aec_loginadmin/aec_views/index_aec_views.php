<div class="row align-items-center h-100">

    <span class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10 offset-xl-4 offset-lg-4 offset-md-3 offset-sm-2 offset-1" style="border-radius: 5px; background:#FFF; box-shadow:11px 11px 11px #DDD;">
        <div class="row">
            <div class="col-12 text-center text-light p-2" style="background:#031122;">
                <h4>PAGE DE CONNEXION</h4>
            </div>

            <div class="col-12 p-3">

                <form method="POST" id="connectUseradmin" action="<?=$router->generateUri("loginAdmin.post.connect", ["action"=>"connect"])?>">

                <input type="hidden" name="<?=$CsrfExtension->getIndex()?>" value="<?=$CsrfExtension->generateToken()?>"/>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><i class="fa fa-user-tie"></i> Nom d'utilisateur</label>
                        <input type="email" class="form-control for-check" name="login_useradmin" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Ne partagez jamais votre nom d'utilisateur.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><i class="fa fa-lock"></i>  Mot de passe</label>
                        <input type="password" class="form-control for-check"  name="mdp_useradmin" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <a class="link text-dark" for="exampleCheck1" style="font-size: 12px;"></a>
                    </div>
                    <button type="button" onClick="loginAdmin(this)" class="btn btn-dark btn-block btn-sm" style="background:#031122;">Se connecter</button>

                </form>

            </div>
        </div>
    </span>
</div>
