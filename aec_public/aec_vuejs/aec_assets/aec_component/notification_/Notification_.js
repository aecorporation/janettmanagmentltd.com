import { get } from "jquery";
import Component from "../../aec_core/Component.js";

export default function Notification_(propos = {}) 
{

    let title = "GESTION DE LA NOTIFICATION";
    let notifContainer = document.getElementById("notifContainer");


    Component.DOM.showContent = (target)=>{

        get(target.getAttribute("action"),(res)=>{
    
            $("#aec-bg").fadeIn(300)

            setTimeout(()=>{
                notifContainer.style.display="block";
                notifContainer.style.transform="translateX(0%)";
                notifContainer.style.transition="250ms linear";
                document.getElementById("list_notification").innerHTML = res;
            }, 300)

        })
         
    
        };

    Component.DOM.closeContent = ()=>{
        
        notifContainer.style.transform = "translateX(100%)";
        notifContainer.style.transition="250ms linear";
        setTimeout(()=>{
            notifContainer.style.display="none";
            $("#aec-bg").fadeOut(50)

        }, 300)
  
  
      };

      
Component.DOM.searchNotification = ()=>{

    let formulaire = document.querySelector("#searchNotification");

    $("#list_notification").html(spinner("loading_x"))

    let data = new FormData(formulaire)

    let url = formulaire.getAttribute("action");
        
        post(url, data, (res, event)=>{

            console.log(res)

            try{
                setTimeout(()=>{
                    document.getElementById("list_notification").innerHTML=res;
                }, 1500)

            }catch(e){
                //console.log(res)
            }

        }, (err)=>{
        });

};
};

