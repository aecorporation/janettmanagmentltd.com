
 const Effects = {

    transition_panel: (ElementShow_)=>{
        
        let elementShow = document.querySelector(ElementShow_)

            elementShow.style.transform ="translateX(0%)";
            elementShow.style.transition="200ms linear";



    },

    transition_panel_inverse: (isElementHidden_)=>{
        
        let isElementHidden = document.querySelector(isElementHidden_)

        isElementHidden.style.transform ="translateX(100%)";
        isElementHidden.style.transition="200ms linear";


    },

    showFormSearchEffect: (selector_)=>{
       
       let selector = document.querySelector(selector_)

       selector.classList.remove("d-sm-none")
       selector.classList.remove("d-none")
       selector.classList.add("fixed-top")
       selector.style.marginTop="50px"
       selector.style.width="100%"
       selector.style.height="100%"
       selector.style.overflow="auto"
    },

    hideFormSearchEffect: (selector_)=>{
       
        let selector = document.querySelector(selector_)
 
        selector.classList.add("d-sm-none")
        selector.classList.add("d-none")
        selector.classList.remove("fixed-top")
        selector.style.marginTop="0"
     },


     changeImg: (target, selector_)=>{

        let element = document.querySelector(selector_)

        element.setAttribute("src", target.getAttribute("src"))

     },
      moveLeft : (parent, lenghtpx=null)=> {
       /* $("." + parent+" ul li:first-child").animate({ "margin-left": -570 }, 800, function () {
            $(this).css("margin-left", 0).appendTo("." + parent + " ul");
        });*/

        let movepixel = -1*(lenghtpx)
        let scrollElement = document.querySelector(parent);
        scrollElement.scrollBy(movepixel, 0)

        console.log(scrollElement, movepixel)
    
    },
    
     moveRight : (parent, lenghtpx= null)=> {
       /* $("." + parent +" ul li:last-child").animate({ "margin-right": -570 }, 800, function () {
            $(this).css("margin-right", 0).prependTo("." + parent+" ul");
        });*/

        let movepixel = lenghtpx
        let scrollElement = document.querySelectorAll(parent);
        scrollElement.forEach(item=>item.scrollBy(movepixel, 0))
    
    }




};

export default Effects