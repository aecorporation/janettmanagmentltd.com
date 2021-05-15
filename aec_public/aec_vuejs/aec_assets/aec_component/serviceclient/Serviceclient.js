import Component from "../../aec_core/Component.js";

export default function Serviceclient(propos = {}) 
{

    let title = "GESTION CONTENU DU SITE";


    Component.DOM.updateServiceclient = (target)=>{

        let msg = "Voulez-vous enregistrer ces informations ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#updateServiceclient")
        
        let textarea = formulaire.querySelector("textarea[name='details']")

        textarea.value = tinymce.get("specialContent").getContent()

        let inputs = formulaire.querySelectorAll(".for-check")

        /**
         * verifie les champs du formulaire
         */
        
        Validator.lists(inputs)
        .isEmpty()

            if(Validator.errors.length > 0){
                notify({status: 2, msg: "Erreur de données"}, title)
                return
            }

            let data = new FormData(formulaire);

            let url = formulaire.getAttribute("action")

            post(url, data, (res, event)=>{

                try{

                let jsonR = JSON.parse(res)

                notify(jsonR, title)

                }catch(e){
                    console.log(res)
                }

            }, (err)=>{
            });
    });

};




}
