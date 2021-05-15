import "bootstrap";
import "jquery-confirm";
import "@fortawesome/fontawesome-free/js/all.js";
import "./aec_assets/aec_core/aec.js";
import Ajax from "./aec_assets/aec_core/Ajax.js";
import "./aec_assets/aec_css/index.scss";
require('tinymce');
var orgchart = require('orgChart');
var Promise = require('es6-promise').Promise;

import App from "./aec_assets/aec_component/App.js";

if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
}

/**
 * Initier tinymce
 */
tinymceInit();
/**
 * Demarrer l'application
 */

 
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  
App();
