

let isEvent = k =>  k.startWith("on");
let eventname = k => k.toLowerCase().substring(2);
let isProp = k =>  k !== "children";


export function CreateDom(fiber){

    const dom =(fiber.type==="TEXT_ELEMENT") 
    ? document.createTextNode(fiber.props.nodeValue) 
    : document.createElement(fiber.type);

    updateDom(dom, {}, fiber.props);
    return dom;

}

export function updateDom(dom, oldprops, newprops){

    // Supprimer les ancienne proprietes
    Object.keys(oldprops).filter((i)=> isProp(i)).forEach(name =>{

        if(!name in newprops){

            if(isEvent(name)){
                dom.removeListener(eventname(name), oldprops[name])
            }else{
                dom[name] = "";
            }
        }
    });
        // Ajouter nouvelle proprietes
        Object.keys(newprops).filter((i)=> isProp(i)).forEach(name =>{

        if(oldprops[name] !== newprops[name]){

            if(isEvent(name)){
                if(oldprops[name]){
                    dom.removeListener(eventname(name), oldprops[name]);
                }
                dom.addEventListener(eventname(name), newprops[name]);

            }else{
                dom[name] = newprops[name];

            }
            }
        });


}