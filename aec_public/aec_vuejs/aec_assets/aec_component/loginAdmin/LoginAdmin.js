import Component from "../../aec_core/Component.js";

export default function LoginAdmin(propos = {}) 
{

    Component.DOM.loginAdmin = (target)=>{

                let formulaire = document.querySelector("#connectUseradmin");

                let inputs = formulaire.querySelectorAll(".for-check");

                let email = document.querySelector("[name='email']");
                let mdp = document.querySelector("[name='mdp']");

                /**
                 * verifie les champs du formulaire
                 */
                
                Validator.lists(inputs).isEmpty();

                if(Validator.errors.length > 0){
                    msgError("Erreur de données");
                    return;
                }

                if(Validator.errors.length <= 0){
                    
                    let data = new FormData(formulaire);

                    let url = formulaire.getAttribute("action");
                    
                    post(url, data, (res, event)=>{

                        console.log(url);
                        console.log(res);

                        try{
    
                        let jsonR = JSON.parse(res);

                        if(jsonR.status === 1){
                            msgSuccess(jsonR.msg);
                            formulaire.reset();
                            setTimeout(() => {
                                location.href="/admin";
                            }, 2000);;
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


}
