import Component from "../../aec_core/Component.js";

export default function Useradmin(propos = {}) 
{
    let title = "GESTION ADMINISTRATION";

    Component.DOM.saveUseradmin = (target)=>{

                let formulaire = document.querySelector("#saveUseradmin");

                let inputs = formulaire.querySelectorAll(".for-check");

                let email = formulaire.querySelector("[name='email_useradmin']");
                let mdp = formulaire.querySelector("[name='mdp_useradmin']");
                let mdp_repeat = formulaire.querySelector("[name='mdp_repeat']");
                let dateNais = formulaire.querySelector("[name='dateNais_useradmin']");
                let nbEnf = formulaire.querySelector("[name='nbenf_useradmin']");

                /**
                 * verifie les champs du formulaire
                 */
                
                Validator.lists(inputs)
                .isEmpty()
                .isDate(dateNais)
                .isMail(email)
                .isNumber(nbEnf);

                if(Validator.errors.length > 0){
                    notify({status: 2, msg: "Erreur de données"}, title);
                    return;
                }

                if(Validator.errors.length <= 0){
                    
                    let data = new FormData(formulaire);

                    let url = formulaire.getAttribute("action");
                    
                    post(url, data, (res, event)=>{

                        console.log(res);

                        try{
    
                        let jsonR = JSON.parse(res);

                        if(jsonR.status === 1){
                            notify(jsonR, title);
                            formulaire.reset();
                            document.getElementById("viewsImage").innerHTML= '<i class="fa fa-image fa-10x"></i>';
                        }else{
                            msgError(jsonR.msg);

                        }

                        }catch(e){

                        }

                    }, (err)=>{
                        console.log(err);
                    });

                }
    };

    Component.DOM.updateUseradmin = (target)=>{

        
        let msg = "Voulez-vous enrégistrer les modifications ?";

        boxConfirm(title, msg, ()=>{

                let formulaire = document.querySelector("#updateUseradmin");

                let inputs = formulaire.querySelectorAll(".for-check");

                let email = formulaire.querySelector("[name='email_useradmin']");
                let mdp = formulaire.querySelector("[name='mdp_useradmin']");
                let dateNais = formulaire.querySelector("[name='dateNais_useradmin']");
                let nbEnf = formulaire.querySelector("[name='nbenf_useradmin']");

                /**
                 * verifie les champs du formulaire
                 */
                
                Validator.lists(inputs)
                .isEmpty()
                .isDate(dateNais)
                .isMail(email)
                .isNumber(nbEnf);

                if(Validator.errors.length > 0){
                    notify({status: 2, msg: "Erreur de données"}, title);
                    return;
                }

                if(Validator.errors.length <= 0){
                    
                    let data = new FormData(formulaire);

                    let url = formulaire.getAttribute("action");
                    
                    post(url, data, (res, event)=>{

                        console.log(res);

                        try{
    
                        let jsonR = JSON.parse(res);

                        if(jsonR.status === 1){
                            notify(jsonR, title);
                        }else{
                            notify(jsonR, title);

                        }

                        }catch(e){

                        }

                    }, (err)=>{
                        console.log(err);
                    });

                }
        });
    };


    Component.DOM.deleteUseradmin = (target)=>{

        let msg = "Voulez-vous supprimer cet administrateur ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#updateUseradmin");

        let url = target.getAttribute("action");

        let data = new FormData(formulaire);
                    
        post(url, data, (res, event)=>{  
            
            try{

                let jsonR = JSON.parse(res);

                if(jsonR.status === 1){

                    notify(jsonR, title);


                    setTimeout(function(){

                            history.go(-1)

                    }, 1000)

                }else{

                    msgError(jsonR.msg);

                }

                }catch(e){

                }

            }, (err)=>{

                console.log(err);
        });

    });

};
    




    Component.DOM.searchUseradmin = (target)=>{

        document.getElementById("tableUseradmin").innerHTML = spinner();

        setTimeout(() => {
            search(target);
        }, 500);

    };


    let search = (target)=>{
        
        let formulaire = document.querySelector("#searchUseradmin");

        let data = new FormData(formulaire);

        let url = formulaire.getAttribute("action");
                    
        post(url, data, (res, event)=>{  
            
            document.getElementById("tableUseradmin").innerHTML = res;

            tinymceInit();

            }, (err)=>{
                console.log(err);
        });
    } ;

    Component.DOM.disconnectUseradmin = (target)=>{

        
        let msg = "Voulez-vous quitter votre panel ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#disconnectUseradmin");

        let url = formulaire.getAttribute("action");

        let data = new FormData(formulaire);
                    
        post(url, data, (res, event)=>{  

            console.log(res)
            
            location.reload();

        }, (err)=>{
            console.log(err);
        });
    });



    }


}
