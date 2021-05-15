import Component from "../../../aec_core/Component.js";

export default function Animation(propos = {}) {

    let body = document.getElementById("body");

    let scrollY = ()=>{

        var supportPageOffset = window.pageXOffset !== undefined;
        var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");

        //var x = supportPageOffset ? window.pageXOffset : isCSS1Compat ? document.documentElement.scrollLeft : document.body.scrollLeft;
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;

    }


    // Variables
    document.querySelectorAll(".aec-sticky").forEach(element=>{

        let offset = 0
        let constraint = document.body
        let rect = element.getBoundingClientRect()
        if(element.hasAttribute("aec-offset")){
            offset = parseInt(element.getAttribute("aec-offset"), 10)
        }
        if(element.hasAttribute("aec-constraint")){
            constraint = document.querySelector(element.getAttribute("aec-constraint"))
        }

        let constraintRect = constraint.getBoundingClientRect()
        let constraintBottom = (constraintRect.top + scrollY() + constraintRect.height) - (offset + rect.height)


        let top = rect.top + scrollY();
        let fake = document.createElement("div")
        fake.style.width = rect.width+"px"
        fake.style.height = rect.height+"px"
        
        // Callback

        function eventOnScroll(){

            let hasClassFixed = element.classList.contains("aec-fixed")

            if(scrollY() > constraintBottom  && element.style.position != "absolute"){

                element.classList.remove("aec-fixed")
                element.style.position = "absolute"
                element.style.top = "auto"
                element.style.bottom = "0"

            }
            else if(scrollY() > top - offset && scrollY() < constraintBottom){

                if(!hasClassFixed && element.style.position != "fixed"){

                    element.classList.add("aec-fixed")
                    element.style.position = "fixed"
                    element.style.top = offset+"px"
                    element.style.width = rect.width+"px"
                    element.parentNode.insertBefore(fake, element)
                    element.style.bottom = "auto"

                }

            }else{
                if(hasClassFixed && element.style.position != "static"){
                    element.classList.remove("aec-fixed")
                    element.style.position = "static"
                    element.style.top = offset+"px"

                    if(element.parentNode.contains(fake))
                        element.parentNode.removeChild(fake)

                }

            }

        }

        function eventOnResize(){

            element.style.width="auto"
            element.classList.remove("aec-fixed")
            fake.style.display="none"

            rect = element.getBoundingClientRect()
            top = rect.top + scrollY();
            fake.style.width = rect.width+"px"
            fake.style.height = rect.height+"px"
            fake.style.display="block"
            eventOnScroll()

        }

        // Listeners
        window.addEventListener("scroll", eventOnScroll, false)
        window.addEventListener("resize", eventOnResize, false)

    });

    let mbs = document.querySelectorAll(".aec-menu-bars");

    mbs.forEach(item=>{

        let frontIndex = "/"
        
        let adminIndex = ""

        if(document.querySelector("[name='admin_prefix']")!= null){

            adminIndex =  document.querySelector("[name='admin_prefix']").value

        }

        if(location.pathname == frontIndex || location.pathname == adminIndex){
            if(item.getAttribute("href")=== frontIndex || item.getAttribute("href")=== adminIndex)
                item.classList.add("aec-active")
            return
        }
        
        if(location.pathname.indexOf(item.getAttribute("href")) >= 0){

            if(
                (item.getAttribute("href") !== frontIndex && !item.classList.contains("aec-active"))
                && (item.getAttribute("href") !== adminIndex && !item.classList.contains("aec-active"))
                ){

                    item.classList.add("aec-active")

                }else{
                    if(item.classList.contains("aec-active"))
                        item.classList.remove("aec-active")
                }


        }else{

            if(item.classList.contains("aec-active"))
                item.classList.remove("aec-active")
        }
       

    })





    //// VENEMENT D'APRITION DES BLOCK

    let ratio = 0.1
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: ratio // le % de la partie visible
      }

    //intersectionRatio calcule le ratio de la partie visible

    const handleIntersect = (entries, observer)=>{
        entries.forEach(entry=>{

            if(entry.intersectionRatio > ratio){
                observer.unobserve(entry.target)
                entry.target.classList.remove("aec-reveal")
                entry.target.style.opacity= "1"
                entry.target.style.transform="translateY(0px)"
                entry.target.style.transitionDuration="1s"
                entry.target.style.transitionTimingFunction ="cubic-bezier(0.5, 0, 0, 1)"

                if(entry.target.hasAttribute("aec-delay"))
                    entry.target.style.transitionDelay= entry.target.getAttribute("aec-delay")+"s"
            }
        })
    }
      
    const observer = new IntersectionObserver(handleIntersect, options);
    document.querySelectorAll(".aec-reveal").forEach(item=>{
        observer.observe(item)
    })


Component.DOM.showMenuMobileAnimation = (target)=>{

    
        if(target.classList.contains("fa-bars")){
            target.classList.replace("fa-bars", "fa-times")
            $('.div_menu_mobile_').animate({left: '0'})
        }else{
            target.classList.replace("fa-times", "fa-bars")
            $('.div_menu_mobile_').animate({left: '-100%'})

        }

}
   
   


}