<?php

use aeCorp\aec_binarydata\PdoData;
use aeCorp\aec_utils\aec_factory\Create;


//DataBase
//mdp = aeCorpDIV-OREOLE
$this->set("params", [
    "host" => "localhost",
    "user" => "root",
    "mdp" => "",
    "db" => "janettmanagmentltd_aecorp_2021546778884"
])
->set(PdoData::class, Create::factory(PdoData::class, [$this->get("params")]))
;
return
[
        "index.css"=>[
            "aec_dist/app.css"
        ],
        "index.js"=>[
            "aec_dist/app.js"
        ],

    "frontFirstLineMenu"=>[],
    "frontFootMenu"=>[],
    "frontUnderMenu"=>[],


    "frontSecondeLineMenu"=>[],

    "adminMenu"=>[],
    "widgetAdminMsg"=>[],

    
        //Vues server
        "root.img.imagevideopub" => $this->get("root.img")."imagevideopub/",
        "root.img.useradmin" => $this->get("root.img")."useradmin/",
        "root.img.site" => $this->get("root.img")."site/",
        "root.img.menuitems" => $this->get("root.img")."menuitems/",

         //Vues client
         "folder.img.imagevideopub" => $this->get("folder.img")."imagevideopub/",
         "folder.img.useradmin" => $this->get("folder.img")."useradmin/",
         "folder.img.site" => $this->get("folder.img")."site/",
         "folder.img.menuitems" => $this->get("folder.img")."menuitems/",

];
