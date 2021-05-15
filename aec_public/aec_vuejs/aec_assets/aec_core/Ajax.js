import Component from "./Component.js";

const Ajax =  ()=>{

    Component.DOM.get = function(url, resole, reject){

            wait()

            let xhr = window.xhr();
            xhr.open("GET", url);
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.addEventListener("load", (event)=>{

                waitStop()

                resole(xhr.response, event);

            }, false);
            xhr.addEventListener("error", (event)=>{

                waitStop()

                reject(xhr);
                
            }, false);
            xhr.send(null);

    };

    
    Component.DOM.post = function(url, data, resole, reject){

            wait()

            let xhr = window.xhr();
            xhr.open("POST", url);
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.addEventListener("load", (event)=>{

                waitStop()
                resole(xhr.response, event);

            }, false);
            xhr.addEventListener("error", (event)=>{

                waitStop()
                reject(xhr);

            }, false);
            xhr.send(data);
    };


};

export default Ajax();
