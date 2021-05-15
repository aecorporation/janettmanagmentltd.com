import {createElement} from "./VirtualDom.js";
import {CreateDom, updateDom} from "./CreateDom.js";

let nextunitOfWork = null;
let wipRoot = null;
let currentRoot = null;
let deletes = [];
let hookIndex = null;
let wipFiber = null;
/**
 * Ajout la fibre au niveau du dom
 */
function commitRoot(){

    deletes.forEach(commitWork);

    commitWork(wipRoot.child);

    currentRoot = wipRoot;

    wipRoot = null;
}

function commitWork(fiber){

    if(!fiber){
        return;
    }

    let domParentFiber = fiber.parent;
    while(!domParentFiber.dom){
        domParentFiber = domParentFiber.parent;
    }

    const domParent = domParentFiber.parent;

    if(fiber.effectag ==="ADD" && fiber.dom !==null){
        domParent.appendChild(fiber.dom);

    }else if(fiber.effectag ==="DELETE" && fiber.dom){

        commitDelete(fiber, domParent);
        return;
        
    }else if(fiber.effectag ==="UPDATE" && fiber.dom !==null){

        updateDom(fiber.dom, fiber.alternate.props, fiber.props);
        domParent.appendChild(fiber.dom);


    }
    commitWork(fiber.child);
    commitWork(fiber.sibling);
}

function commitDelete(fiber, domParent){

    if(fiber.dom){
        domParent.removeChild(fiber.dom);
    }else{
        commitDelete(fiber.child, domParent);
    }
}

function render(element, container){

    wipRoot = {
        dom: container,
        props: {
            children: [element]
        },
        alternate: currentRoot
    }

    nextunitOfWork = wipRoot;

    deletes = [];
}

/**
 * Planificateur de boolot
 * @param {*} deadLine 
 */
 function workLoop(deadLine){

    //console.log(deadLine.timeRemaining())

    let shouldYield = false;

    while(nextunitOfWork && !shouldYield){
        nextunitOfWork = performUnitOfWork(nextunitOfWork);
        shouldYield = deadLine.timeRemaining() < 1 ;
    }

    if(!nextunitOfWork && wipRoot){
        commitRoot();
    }

    requestIdleCallback(workLoop);
 }
 
 requestIdleCallback(workLoop);
 /**
  * 
  * @param {*} nextunitOfWork 
  */

 function performUnitOfWork(fiber){

    if(fiber.type instanceof Function){
        updateFunctionComponent(fiber);
    }else{
        updateHostComponent(fiber);
    }

    if(fiber.child){
        return fiber.child;
    }

    let nextfiber = fiber;

    while(nextfiber){
        if(nextfiber.sibling){
           return nextfiber.sibling;
        }

        nextfiber = nextfiber.parent;
    }
    return null;
 }

 function updateFunctionComponent(fiber){

    wipFiber = fiber;
    hookIndex = 0;

    wipFiber.hooks = [];

    const children = [fiber.type(fiber.props)];

    reconcialeChildren(fiber, children);

 }

 function useState(initial){

    const oldHook = wipRoot.alternate && wipFiber.alternate.hooks && wipFiber.alternate.hooks[hookIndex];
    const hooks = {
        state: oldHook ? oldHook.state : initial;
    }

    wipFiber.hooks.push(hooks);

    const setState = state => {
        hooks.state = state;
        render(currentRoot.props.children[0], currentRoot.dom);
    }
    hookIndex ++;

    return [hooks.state, setState];
 }

 function updateHostComponent(fiber){
    
   if(!fiber.dom){
        fiber.dom = CreateDom(fiber)
    }

    // tous les element de la fibre

    let elements = fiber.props.children;

    reconcialeChildren(fiber, elements);

}

 function reconcialeChildren(wipFiber, elements){


    let prevSibling = null;
    let index = 0;

    let oldFiber = wipFiber.alternate && wipFiber.alternate.child
 
    while(index < elements.length || oldFiber !==null){
 
    const sameType = oldFiber && elements[index] && oldFiber.type === elements[index].type;

    let newFiber = null;

    if(sameType){ // remplacer l'element

        newFiber = {
            type: elements[index].type,
            props: elements[index].props,
            parent: wipFiber,
            dom: oldFiber.dom,
            alternate: oldFiber,
            effectag: "UPDATE"
        }

    }

    if(elements && !sameType){// Ajouter l'element

        newFiber = {
            type: elements[index].type,
            props: elements[index].props,
            parent: wipFiber,
            dom: null,
            alternate: null,
            effectag: "ADD"
        }

    }

    if(oldFiber && !sameType){ // Supprimer l'element

        oldFiber.effectag = "DELETE";
        deletes.push(oldFiber);
    }

    if(oldFiber){
        oldFiber = oldFiber.sibling;
    }
    
 
     if(index==0){
 
        wipFiber.child = newFiber;
 
     }else if(elements[index]){
 
         prevSibling.sibling = newFiber;
 
     }
 
     prevSibling = newFiber;
 
     index++;
    }

 }



window.ReactAec = {

    createElement,
    render,
    useState
} 
