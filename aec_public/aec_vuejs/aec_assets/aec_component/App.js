import Component from "../aec_core/Component.js";
import LoginAdmin from "./loginAdmin/LoginAdmin.js";
import Privilege from "./useradmin/Privilege.js";
import Useradmin from "./useradmin/Useradmin.js";
import Imagevideopub from "./imagevideopub/Imagevideopub.js";
import Blog from "./blog/Blog.js";
import Routing from "./routing/Routing.js";
import Menuitems from "./menuitems/Menuitems.js";
import Serviceclient from "./serviceclient/Serviceclient.js";
import Apropos from "./apropos/Apropos.js";
import Juridique from "./juridique/Juridique.js";
import Messagerie from "./messagerie/Messagerie.js";
import Notification_ from "./notification_/Notification_.js";
import Realtimes from "./realtimes/Realtimes.js";
import Effects from "../aec_core/Effects.js"
import Pagination from "./aec_infrastructures/pagination/Pagination.js"
import Animation from "./aec_infrastructures/animation/Animation.js"

export default function App(props = {}){

    Component.DOM.Effects = Effects

    LoginAdmin(); // Connexion admin
    Privilege(); // Gestion privilege
    Useradmin(); // Gestion admin
    Imagevideopub();
    Menuitems();
    Blog();
    Serviceclient();
    Apropos();
    Juridique();
    Messagerie();
    Notification_();
    Realtimes();
    Pagination()
    Animation()
    Routing()

}