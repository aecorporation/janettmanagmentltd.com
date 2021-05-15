import Component from "../../aec_core/Component.js";

export default function User(propos = {}) 
{

    let title = "GESTION DE UTILISATEURS";

   
    Component.DOM.regularFormUser = (target)=>{

        if(target.value ==="Employé"){
          
          $(".society").slideDown(200)

          $(".no-society").slideDown(200)

      }
      else if(target.value ==="Particulier"){

        $(".society .for-check").val("")

        $(".no-society").slideDown(200)

        $(".society").slideUp(200)

      }else if(target.value ==="Entreprise"){

        $(".no-society .for-check").val("")

         $(".society").slideDown(200)

        $(".no-society").slideUp(200)


      }else{

      }

    };



    Component.DOM.saveUser = (target)=>{

                let formulaire = document.querySelector("#saveUser")
        
                let textarea = formulaire.querySelector("textarea[name='details_user']")

                textarea.value = tinymce.get("specialContent").getContent()

                let inputs = formulaire.querySelectorAll(".for-check")

                let email = formulaire.querySelector("[name='email_user']");

                let dateNais = formulaire.querySelector("[name='dateNais_user']");

                /**
                 * verifie les champs du formulaire
                 */
                
                Validator.lists(inputs)
                .isEmpty()
                .isDate(dateNais)
                .isMail(email);

                    if(Validator.errors.length > 0){
                        notify({status: 2, msg: "Erreur de données"}, title)
                        return
                    }

                    if(document.querySelector("[name='type_user']").value==="Particulier"){

                        let inputs = formulaire.querySelectorAll(".for-check_")

                        Validator.lists(inputs).isEmpty()

                        if(Validator.errors.length > 0){
                            notify({status: 2, msg: "Erreur des données"}, title)
                            return
                        }
                    }

                     if(document.querySelector("[name='type_user']").value==="Entreprise"){

                        let inputs = formulaire.querySelectorAll(".for-check2")

                        Validator.lists(inputs).isEmpty()

                        if(Validator.errors.length > 0){
                            notify({status: 2, msg: "Erreur des données"}, title)
                            return
                        }
                    }

                    let data = new FormData(formulaire);

                    let url = formulaire.getAttribute("action")
                    
                    post(url, data, (res, event)=>{

                        try{
    
                        let jsonR = JSON.parse(res)

                        notify(jsonR, title)

                        if(jsonR.status === 1){

                            fermerForm("saveUser")
                            document.getElementById("viewsImage").innerHTML='<i class="fa fa-image fa-10x"></i>'
                            document.getElementById("viewsImage2").innerHTML='<i class="fa fa-image fa-10x"></i>'

                        }

                        }catch(e){
                            console.log(res)
                        }

                    }, (err)=>{
                    });

    };


    Component.DOM.updateUser = (target)=>{

        let msg = "Vulez-vous vraiment enrgistrer les modifications";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#updateUser");
        
        let textarea = formulaire.querySelector("textarea[name='details_user']")

        textarea.value = tinymce.get("specialContent").getContent()

        let inputs = formulaire.querySelectorAll(".for-check")

        let email = formulaire.querySelector("[name='email_user']");

        let dateNais = formulaire.querySelector("[name='dateNais_user']");

        /**
         * verifie les champs du formulaire
         */
        Validator.lists(inputs)
        .isEmpty()
        .isDate(dateNais)
        .isMail(email);

            if(Validator.errors.length > 0){
                notify({status: 2, msg: "Erreur de données"}, title)
                return
            }

            if(document.querySelector("[name='type_user']").value ==="Particulier"){

                let inputs = formulaire.querySelectorAll(".for-check_")

                Validator.lists(inputs).isEmpty()

                if(Validator.errors.length > 0){
                    notify({status: 2, msg: "Erreur des données"}, title)
                    return
                }
            }

             if(document.querySelector("[name='type_user']").value==="Entreprise"){

                let inputs = formulaire.querySelectorAll(".for-check2")

                Validator.lists(inputs).isEmpty()

                if(Validator.errors.length > 0){
                    notify({status: 2, msg: "Erreur des données"}, title)
                    return
                }
            }

            let data = new FormData(formulaire);

            let url = formulaire.getAttribute("action");
            
            post(url, data, (res, event)=>{

                try{

                let jsonR = JSON.parse(res);

                notify(jsonR, title);

                }catch(e){

                    console.log(res)

                }

            }, (err)=>{
            });
        });

};

Component.DOM.deleteUser = (target)=>{

        let msg = "Voulez-vous supprimer ce client ?";

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

Component.DOM.deleteProduitUser = (target)=>{

       let msg = "Voulez-vous supprimer ce produit ?";

        boxConfirm(title, msg, ()=>{

        let url = target.getAttribute("action");

        let data = new FormData();

        data.append("csrf", $("#csrf").val());
                    
        post(url, data, (res, event)=>{

            console.log(res);

            try{

                let jsonR = JSON.parse(res);

                notify(jsonR, title);

                $("#row-"+target.getAttribute("id")).fadeUp(500)

                }catch(e){
                    
                    console.log(res)

                }

            }, (err)=>{

                console.log(err);
        });

    });

};


Component.DOM.searchUser = ()=>{

    let formulaire = document.querySelector("#searchUser");

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

    document.querySelector("#searchUser").reset();
    
    searchUser();

};



}
