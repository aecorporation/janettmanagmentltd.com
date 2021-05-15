import { Route } from "./Route";

export default class Router {

    constructor(routes){

        this.routes = routes;

    }

    match(pathname){

        for(let i=0; i<=(this.routes.length - 1);i++){

            if(this.routes[i].children){

                for(let j=0; j<=(this.routes[i].children.length - 1); j++){

                    let u = this.routes[i].path + this.routes[i].children[j].path;

                    this.routes[i].children[j].path = u;

                   let r = this.resolve(pathname, this.routes[i].children[j]);

                    if(r !==null){
                        return r;
                    } 
                }

            }else{

                    let r = this.resolve(pathname, this.routes[i]);
                    
                    if(r !==null){
                        return r;
                    } 
            }

        }

        return null;

    }

    resolve(pathname, object){

        let values = {};
        
        let obj = this.parseUrl(object.path);

        let url = obj.urlparsed.replace(/\//g, '\\/');

        let reg = new RegExp("^"+obj.urlparsed+"$");

        let matches = pathname.match(reg);


        if(matches !==null){

            for(let i=0; i <= obj.tabs.length-1; i++){
                values[obj.tabs[i]] = matches[i+1];


            }

            let data = {
                path: matches[0],
                component: object.component,
                redirect: (object.redirect)? object.redirect:"",
                params: values,
            }

            return new Route(data);

        }

        return null;
    }

    parseUrl(url) {

        let tabs = [];

        let urlparsed =  url.replace(/([a-zA-Z0-9_-]+):([^\/]+)/g, (cor, $1, $2)=>{
            tabs.push($1);
            return $2;
        });


        return {
            urlparsed: urlparsed,
            tabs: tabs
        }
    }

};
