import Component from "../../aec_core/Component.js";

export default function Imagevideopub(propos = {}) 
{

    let title = "GESTION IMAGES - VIDEOS";

    Component.DOM.saveImagevideopub = (target)=>{

                let formulaire = document.querySelector("#saveImagevideopub")
        
                let textarea = formulaire.querySelector("textarea[name='details_imagevideopub']")

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

                        if(jsonR.status === 1){
                            formulaire.reset()
                        }

                        }catch(e){
                            console.log(res)
                        }

                    }, (err)=>{
                    });

    };


    Component.DOM.updateImagevideopub = (target)=>{

        let msg = "Voulez-vous modifier ce fichier ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#updateImagevideopub")
        
        let textarea = formulaire.querySelector("textarea[name='details_imagevideopub']")

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

Component.DOM.deleteImagevideopub = (target)=>{

        let msg = "Voulez-vous supprimer ce fichier ?";

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


Component.DOM.searchImagevideopub = ()=>{

    let formulaire = document.querySelector("#searchImagevideopub");

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

    document.querySelector("#searchImagevideopub").reset();
    
    searchImagevideopub();

};



}
