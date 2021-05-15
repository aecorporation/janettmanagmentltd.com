import Component from "../../../aec_core/Component.js";

export default function Pagination(propos = {}) {

//// Pagination

let indicewidth = 35+5+5//dimenesion css

if(document.querySelector("[currentIndice]") !== null){

    let currentIndice =  document.querySelector("[currentIndice]")

    let lengthToScroll = (parseInt(currentIndice.getAttribute("currentIndice")) - 1) * indicewidth

    document.querySelectorAll("#aec_pagination").forEach(item => item.scrollBy((lengthToScroll - 1), 0))
}

Component.DOM.OperationShowIndice = (target)=>{

    let indice = target.getAttribute("indice")

    let url = target.getAttribute("action")

    history.pushState({}, "", url)

    let data = null

    //Formulaire de recherche
    if(document.querySelector("#searchFormProduits") !== null){

            data = new FormData(document.querySelector("#searchFormProduits"))

            post(url, data, (res, event)=>{

                response(res, indice)

            }, (err)=>{

            //console.log(res)

            });

    }else{

            get(url, (res, event)=>{

                response(res, indice)
        
            }, (err)=>{
                
                //console.log(res)

            });

    }

    
 }

 function response(res, indice){

    try{
        document.querySelector("#space_of_list").innerHTML = res
            document.querySelectorAll(".indice").forEach(item => {
            if(item.classList.contains("active") 
            && item.getAttribute("indice") !== indice
            ){
                item.classList.remove("active")
            }
            if(item.getAttribute("indice") === indice)
            item.classList.add("active")
        } )     
        
        document.querySelector("[currentIndice]").setAttribute("currentIndice", indice)

    }catch(e){
        //console.log(res)
    }

 }

Component.DOM.showPageIndiceleft = (target)=>
{
    let indice = parseInt(target.getAttribute("data-left"));
    let movepixel = -1*(indicewidth * indice)
    let scrollPagination = document.querySelectorAll("#aec_pagination");
    scrollPagination.forEach(item=>item.scrollBy(movepixel, 0))

    let next = indice + 1
    target.setAttribute("data-left", next)
    document.querySelectorAll("[data-right]").forEach(item => item.setAttribute("data-right", "1"))
}

Component.DOM.showPageIndiceright = (target)=>{

    let indice = parseInt(target.getAttribute("data-right"));
    let movepixel = (indicewidth * indice)


    let scrollPagination = document.querySelectorAll("#aec_pagination");
    scrollPagination.forEach(item => item.scrollBy(movepixel, 0))

    let next = indice + 1
    target.setAttribute("data-right", next)
    document.querySelectorAll("[data-left]").forEach(item=>item.setAttribute("data-left", "1"))
}



}