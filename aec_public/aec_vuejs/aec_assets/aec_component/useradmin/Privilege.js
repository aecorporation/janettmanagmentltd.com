import Component from "../../aec_core/Component.js";

export default function Privilege(propos = {}) 
{
    let title = "GESTION PRIVILEGES";

    Component.DOM.savePrivilege = (target)=>{

                let formulaire = document.querySelector("#savePrivilege");

                let inputs = formulaire.querySelectorAll(".for-check");


                /**
                 * verifie les champs du formulaire
                 */
                Validator.lists(inputs).isEmpty()

                if(Validator.errors.length > 0){
                    notify({status: 2, msg: "Erreur de données"}, title);
                    return;
                }
        

                if(Validator.errors.length <= 0){
                    
                    let data = new FormData(formulaire);

                    let url = formulaire.getAttribute("action");

                    document.getElementById("visualiserprivilege").innerHTML = spinner()
                    
                    post(url, data, (res, event)=>{

                        console.log(res);

                        try{
    
                        let jsonR = JSON.parse(res);
                        if(jsonR.status === 1){
                            notify(jsonR, title);
                            formulaire.reset();

                            setTimeout(() => {
                                document.getElementById("visualiserprivilege").innerHTML = jsonR.render;
                            }, 1000);

                        }else{
                            notify(jsonR, title);

                        }

                        }catch(e){

                        }

                    }, (err)=>{
                        console.log(err);
                    });

                }
    };

    Component.DOM.updatePrivilege = (target)=>{

        let msg = "Voulez-vous enrégistrer les modifications ?";

        boxConfirm(title, msg, ()=>{

        let formulaire = document.querySelector("#updatePrivilege");

        let inputs = formulaire.querySelectorAll(".for-checkC");

        /**
         * verifie les champs du formulaire
         */
        
        Validator.lists(inputs).isEmpty()

        if(Validator.errors.length > 0){
            notify({status: 2, msg: "Erreur de données"}, title);
            return;
        }


        if(Validator.errors.length <= 0){
            
            let data = new FormData(formulaire);

            let url = formulaire.getAttribute("action");

            document.getElementById("visualiserprivilege").innerHTML = spinner()
            
            post(url, data, (res, event)=>{

                console.log(res)

                try{

                let jsonR = JSON.parse(res);

                if(jsonR.status === 1){

                    notify(jsonR, title);

                        setTimeout(() => {
                                document.getElementById("visualiserprivilege").innerHTML = jsonR.render;
                        }, 1000);
                    
                }else{

                    notify(jsonR, title);                }

                }catch(e){

                }

            }, (err)=>{

                console.log(err);
            });

        }

    });

};

Component.DOM.visualiserPrivilege = (target)=>{

    let url = target.getAttribute("action");

    get(url, (res, event)=>{  

        let modal = $('#staticBackdrop')
        modal.find(".modal-title").html('<h4><i class="fa fa-user-tie"></i> DETAILS DU PRIVILEGE</h4>')
        modal.find(".modal-body").html(res);
        modal.modal("show");
        tinymceInit()
        }, (err)=>{
            console.log(err);
    });
} ;

Component.DOM.deletePrivilege = (target)=>{

        let msg = "Voulez-vous supprimer ce privilege ?";

        boxConfirm(title, msg, ()=>{


        let url = target.getAttribute("action");

        let data = new FormData()
        data.append("csrf", $("#csrf").val());
        data.append("code_privilege", target.getAttribute("id"));
                    
        post(url, data, (res, event)=>{  

            console.log(res)
            
            try{

                let jsonR = JSON.parse(res);

                if(jsonR.status === 1){

                    notify(jsonR, title);

                    document.getElementById("visualiserprivilege").innerHTML = spinner()

                    setTimeout(() => {
                        document.getElementById("visualiserprivilege").innerHTML = jsonR.render;
                    }, 1000);

                    $('#staticBackdrop').modal("hide")


                }else{

                    notify(jsonR, title);

                }

                }catch(e){

                }

            }, (err)=>{

                console.log(err);
        });

    });

};


    Component.DOM.clearnInput = ()=>{

        let searchId = document.querySelector("#searchPrivilege");
        
        searchId.reset();

        search(document.querySelector("#inputSearch"));

    };

    Component.DOM.searchPrivilege = (target)=>{

        search(target);
    };


    let search = (target)=>{
        
        let formulaire = document.querySelector("#searchPrivilege");

        let data = new FormData(formulaire);

        let url = formulaire.getAttribute("action");

        document.getElementById("visualiserprivilege").innerHTML = spinner()
                    
        post(url, data, (res, event)=>{  
            
            setTimeout(() => {
                document.getElementById("visualiserprivilege").innerHTML = res;
            }, 1000);

            }, (err)=>{
                console.log(err);
        });
    } ;

    

}
