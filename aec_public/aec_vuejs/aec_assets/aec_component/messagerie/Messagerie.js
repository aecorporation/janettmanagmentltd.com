import Component from "../../aec_core/Component.js";

export default function Messagerie(propos = {}) 
{

    let title = "GESTION DE LA MESSAGERIE";

    

Component.DOM.deleteMessagerie = (target)=>{

        let msg = "Voulez-vous supprimer ce message ?";

        boxConfirm(title, msg, ()=>{

        let url = target.getAttribute("action");

        let data = new FormData();

        data.append("csrf", $("#csrf").val());
                    
        post(url, data, (res, event)=>{

            console.log(res);

            try{

                let jsonR = JSON.parse(res);

                notify(jsonR, title);

                if(jsonR.status == 1){

                    if(document.getElementById("line-"+target.getAttribute("id"))!==null){
                        $("#line-"+target.getAttribute("id")).slideUp(100)
                    }else{

                        setTimeout(()=>{
                            history.go(-1)
                        }, 1500)
                        
                    }

                }


                }catch(e){

                    console.log(res)

                }

            }, (err)=>{

                console.log(err);
        });

    });

};


Component.DOM.searchMessagerie = ()=>{

    let formulaire = document.querySelector("#searchMessagerie");

    $("#table").html(spinner("loading_x"))

    let data = new FormData(formulaire)

    let url = formulaire.getAttribute("action");
        
        post(url, data, (res, event)=>{

            console.log(res)

            try{
                setTimeout(()=>{
                    document.getElementById("table").innerHTML=res;
                }, 1500)

            }catch(e){
                //console.log(res)
            }

        }, (err)=>{
        });

};
Component.DOM.searchClearnUser = ()=>{

    document.querySelector("#searchMessagerie").reset();
    
    searchMessagerie();

};





/// FRONT //////

Component.DOM.sendMessageOnContact = (target)=>{

    let formulaire = target

    let data = null

    let inputs = formulaire.querySelectorAll(".for-check");

    /**
     * verifie les champs du formulaire
     */
    Validator.lists(inputs).isEmpty();

        if(Validator.errors.length > 0){
            notify({status: 2, msg: "Erreur de données"}, title);
            return;
        }

        data = new FormData(target)

        let url = formulaire.getAttribute("action")
        
        post(url, data, (res, event)=>{

            try{
            
                let jsonR = JSON.parse(res);

                    notify(jsonR, title);

                    if(jsonR.status === 1){
    
                        target.reset();

                        return
                    }
    
                }catch(e){
                    console.log(res)
                }

        }, (res)=>{
            console.log(res)
        })
}















}
