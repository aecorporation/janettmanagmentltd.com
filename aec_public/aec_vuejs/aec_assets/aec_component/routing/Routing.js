import Component from "../../aec_core/Component.js";

export default function Routing(propos = {}) 
{

   let routes = document.querySelectorAll("[aec-router]");

   routes.forEach(route =>{

        route.addEventListener("click", (event)=>{

            let url = route.getAttribute("aec-router")

            func(url)

            history.pushState({}, "", url)

        })
})


let func = (url)=>{

   let panels = document.querySelectorAll(".aec-panel")

      routes.forEach(route =>{

            if(route.getAttribute("aec-router") == url)
            {
                if(!route.classList.contains("active")){
                    route.classList.add("active")
                }
            }else{
                if(route.classList.contains("active")){
                    route.classList.remove("active")
                }
            }
       
        })


                if(document.querySelector("[aec-action='"+url+"']") !== null)
                {
                    let panel = document.querySelector("[aec-action='"+url+"']")
                    panel.style.display="block"

                    setTimeout(() => {
                        
                        panel.style.transform ='translateY(0)'
                        panel.style.transitionDuration="500ms"
                        panel.style.transitionTimingFunction ="cubic-bezier(0.5, 0, 0, 1)"
                        
                    }, 5);
                }

                panels.forEach((panel)=>{
    
                    if(panel.getAttribute("aec-action") !== url && panel.style.display=="block")
                    {
    
                           panel.style.transform ='translateY(-100%)'
                           panel.style.transitionDuration="0ms"
    
                             setTimeout(() => {
                            
                                panel.style.display="none"
    
                            }, 5);
    
                    }
                })
}


func(location.pathname)

window.addEventListener("popstate", (e)=>{
    func(location.pathname)
}, false)





}
