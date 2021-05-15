import Component from "../../aec_core/Component.js";

export default function Realtimes(propos = {}) 
{
    sourceEvent()
    
    function sourceEvent(){

        if(document.querySelector("[name='realtimes']") !== null){

            let countNotify = document.querySelector("#countNotify");

            let countMsg = document.querySelector("#countMsg");

            let url = document.querySelector("[name='realtimes']").getAttribute("action");

            let sourceEvent = new EventSource(url)

            sourceEvent.addEventListener("allNotify", (e)=>{

                try{

                    let data = JSON.parse(e.data)

                    if(data.admin.connected == false){
                        location.reload()
                    }
                    
                    if(data.notify.nb > 0){
                        countNotify.innerHTML = (data.notify.nb <= 9) ? "0"+data.notify.nb : data.notify.nb
                        countNotify.style.visibility="visible"
                    }else{
                        if(countNotify.style.visibility === "visible"){
                            countNotify.innerHTML= data.notify.nb
                            countNotify.style.visibility="hidden"
                        }
                    }

                    if(data.message.nb > 0){
                        countMsg.innerHTML = (data.notify.nb <= 9) ? "0"+data.message.nb : data.message.nb
                        countMsg.style.visibility="visible"
                    }else{
                        if(countMsg.style.visibility === "visible"){
                            countMsg.innerHTML = data.message.nb
                            countMsg.style.visibility="hidden"
                        }
                    }

                }catch(e){
                   //console.log(e)
                }
                
            }, false)

        }

    }

}