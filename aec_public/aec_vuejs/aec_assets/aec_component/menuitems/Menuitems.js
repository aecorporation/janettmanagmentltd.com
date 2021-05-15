import Component from "../../aec_core/Component.js";

export default function menuitems(propos = {}) 
{

    let title = "SERVICES ET MISSION";

    Component.DOM.saveMenuitems = (target)=>{

                let formulaire = document.querySelector("#savemenuitems")
        
                let textarea = formulaire.querySelector("textarea[name='details_menuitems']")

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


    Component.DOM.updateMenuitems = (target)=>{

        let msg = "Voulez-vous modifier ce contenu ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#updatemenuitems")
        
        let textarea = formulaire.querySelector("textarea[name='details_menuitems']")

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

Component.DOM.deleteMenuitems = (target)=>{

        let msg = "Voulez-vous supprimer ce contenu ?";

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


Component.DOM.searchMenuitems = ()=>{

    let formulaire = document.querySelector("#searchmenuitems");

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

    document.querySelector("#searchmenuitems").reset();
    
    searchmenuitems();

};
























Component.DOM.saveChildrenMenuitems = (target)=>{

                let formulaire = document.querySelector("#modalForm")
        
                let textarea = formulaire.querySelector("textarea[name='contenu_children_menuitems']")

                textarea.value = tinymce.get("specialContent_2").getContent()

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
                            document.getElementById("content_image_relative").innerHTML= jsonR.views
                            tinymceInit()
                        }

                        }catch(e){
                            console.log(res)
                        }

                    }, (err)=>{
                    });

    };


    Component.DOM.updateChildrenMenuitems = (id)=>{

        let msg = "Voulez-vous modifier ce contenu ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#modalForm_"+id)
        
        let textarea = formulaire.querySelector("textarea[name='contenu_children_menuitems']")

        textarea.value = tinymce.get("specialContent_"+id).getContent()

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
                    document.getElementById("content_image_relative").innerHTML= jsonR.views
                    tinymceInit()
                }

                }catch(e){
                    console.log(res)
                }

            }, (err)=>{
            });
    });

};

Component.DOM.deleteChildrenMenuitems = (target)=>{

        let msg = "Voulez-vous supprimer ce contenu ?";

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




}
