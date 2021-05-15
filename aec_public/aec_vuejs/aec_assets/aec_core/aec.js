import Component from "./Component.js";

import logo_ from "../../aec_dist/aec_img/logo.png";

let logo = "/aec_public"+logo_;

Component.DOM.tinymceInit = ()=>{
	
if(window.tinymce){
	$(window.tinymce.editors).each(function(idx, p) {
	window.tinymce.remove(idx);
	});
  }
  tinymce.init({
	  selector: 'textarea.specialarea',  // change this value according to your HTML
	  height : "320",
	  mobile: {
		  menubar: true,
		  theme: 'mobile',
		  plugins: 'autosave lists autolink',
		  toolbar: 'undo bold italic styleselect'
		},
	  plugins: [
		  'advlist autolink link image lists charmap print preview hr anchor pagebreak',
		  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
		  'table emoticons template paste help'
		],
		toolbar: `undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify 
				  | bullist numlist outdent indent | link image | print preview media fullpage 
				  | forecolor backcolor emoticons | help`,
		menu: {
		  favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
		},
		menubar: 'favs file edit view insert format tools table help',
		content_css: 'css/content.css'
	});

};



Component.DOM.fermerForm = (...formulaires)=>{

	formulaires.forEach((item)=>{
		document.getElementById(item).reset();
	});

	if(document.querySelector("#specialContent"))
		tinymce.get("specialContent").setContent("<p></p>");
};

/// COOKIE //////////////
function getCookieVal(offset) {
	let endstr=document.cookie.indexOf (";", offset);
	if (endstr==-1)
      		endstr=document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr));
}

Component.DOM.getCookie = (name)=> {
	let arg=name+"=";
	let alen=arg.length;
	let clen=document.cookie.length;
	let i=0;
	while (i<clen) {
		let j=i+alen;
		if (document.cookie.substring(i, j)==arg)
                        return getCookieVal(j);
                i=document.cookie.indexOf(" ",i)+1;
                        if (i==0) break;
	}
	return null;
}


Component.DOM.setCookie = function(name, value){

// un cookie a besoin d'un nom, d'une valeur, d'un nom de domaine, d'une date d'expiration
// 
	let argv=arguments;
	let argc=arguments.length;
	let expires=(argc > 2) ? argv[2] : null;
	let path=(argc > 3) ? argv[3] : null;
	let domain=(argc > 4) ? argv[4] : null;
	let secure=(argc > 5) ? argv[5] : false;
	document.cookie=name+"="+escape(value)+
		((expires==null) ? "" : ("; expires="+expires.toGMTString()))+
		((path==null) ? "" : ("; path="+path))+
		((domain==null) ? "" : ("; domain="+domain))+
		((secure==true) ? "; secure" : "");
}

Component.DOM.deleteCookie = (name)=> {
	let exp=new Date();
	exp.setTime (exp.getTime() - 100000);
	let cval=getCookie(name);
	document.cookie=name+"="+cval+"; expires="+exp.toGMTString();
}


/// COOKIE //////////////

Component.DOM.spinner = (option = null)=>{

	let spinner = "";

	if(option==null){

	spinner = '<span class="text-center"><span class="spinner-border" role="status"> <span class="sr-only"></span></span></span>';

	}else{

		if(option=="loading_sm"){
		
		spinner = '<div class="text-center mt-2"><strong>Veuillez patientez...</strong> <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div>';

		}
		if(option=="loading_x"){
		
			spinner = '<div class="text-center mt-2"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Veuillez patientez...</div>';
	
		}
		if(option=="loading_grow_sm"){
		
			spinner = '<div class="text-center mt-2"><strong>Veuillez patientez...</strong> <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></div>';
	
			}
			if(option=="loading_grow_x"){
			
				spinner = '<div class="text-center mt-2"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Veuillez patientez...</div>';
		
			}

	}

	return spinner;


}

Component.DOM.comeBack = ()=>{
	history.go(-1);
}

Component.DOM.showPanel = (id_1, id_2)=>{
	$("#"+id_1).slideUp(50);
	$("#"+id_2).slideDown(500);
}

Component.DOM._=(selector)=>{

	let selects = document.querySelectorAll(selector);

	if(selects.length === 0){

		return null;

	}
	if(selects.length === 1){

		return selects[0];

	}else{

		return selects;

	}
}

Component.DOM.xhr = function(){
	let xhr = null;
	try {
		xhr = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {
			try {
				xhr = new XMLHttpRequest();
			} catch (e) {
				alert("Impossible d'utiliser AJAX");
			}
		}
	}
	return xhr;
}


Component.DOM.formatMoney = function(num, localize, fixedDecimalLength){
	num = num + "";
	let str = num;
	let reg = new RegExp(/(\D*)(\d*(?:[\.|,]\d*)*)(\D*)/g)
	if (reg.test(num)) {
		let pref = RegExp.$1;
		let suf = RegExp.$3;
		let part = RegExp.$2;
		if (fixedDecimalLength / 1) part = (part / 1).toFixed(fixedDecimalLength / 1);
		if (localize) part = (part / 1).toLocaleString();
		str = pref + part.match(/(\d{1,3}(?:[\.|,]\d*)?)(?=(\d{3}(?:[\.|,]\d*)?)*$)/g).join(' ') + suf;
	};
	return str;
}

 Component.DOM.notify= function(jsonR, title= "", attrId= ""){

	if (typeof jsonR === "object") {

		if (jsonR.status === 0) {

			let message = "";

			// Construction du message d'erreur

			if (typeof jsonR.msg === "object") {


			 message = '<div class="text-left" style="font-size:13px;">';

			for (const key in jsonR.msg) {

				let msg = "";

				if (_(`[name="${key}"]`) !== null) {

					let elem = _(`[name="${key}"]`)

					if(elem.length>1){
						elem = _(`[name="${key}"]`)[0]
					}else{
						elem = _(`[name="${key}"]`)
					}
					// Rendre rouge les bordure des input
					elem.classList.add("is-invalid");
				} 
				msg = jsonR.msg[key];

				message += `<i class="fa fa-square" style="color: red; margin-top: 5px;"></i> ${msg}</br>`;
			}
			message += "</div>";


			}else if(typeof jsonR.msg==="string"){

					message = jsonR.msg
					
			}else{
				message = '<div class="text-center" style="font-size:13px;">Renseignez correctement les champs</div>'
			}
			
			error(message, title);
			

		}
		else if (jsonR.status === 1) {
			success(jsonR.msg, title);

		}
		else if (jsonR.status === 2) {

			error(jsonR.msg, title);
		}

	} else {
		error("Contacter le webmaster...", title);
	}

	document.querySelectorAll(`[name]`).forEach(item => {
		item.addEventListener("keyup", (e)=>{
			item.classList.remove("is-invalid");
		}, false)

		item.addEventListener("change", (e) => {
			item.classList.remove("is-invalid");
		}, false)
		
	});


}
///////////////////////////////////////////////////////////////

Component.DOM.boxConfirm = (titre, msg, callback, typeAnimated, onContentReady) =>{
	
	$.confirm({
		theme: 'light',
		closeIcon: true,
		title: `<img src="${logo}" style="max-height: 30px;" /> <b style="font-size:12px;">${titre}</b>`,
		content: `<div class="col-12 text-center" style="border:0px solid #DDD;padding:5px;font-family:arial black;font-size:12px;">
					${msg}
				</div>
						
						`,
		draggable: false,
		useBootstrap: true,
		columnClass: 'col-xl-4 col-xl-4  col-md-4 col-sm-6 col-12',
		buttons: {
			button_1:  {
				text: 'Confirmer',
				btnClass: 'btn-light',
				action: callback
				},

			button_2:  {
				text: 'Annuler',
				btnClass: 'btn-light',
				action: ()=>{}
				}
		},
		typeAnimated: typeAnimated,
		onContentReady: onContentReady

	});
}

Component.DOM.htmlContent = function(theme = "light",title, content, contentLoaded, onContentReady){
	$.dialog({
		theme: theme,
		title: `<img src="${logo}" style="max-height: 30px;" /> <b style="font-size:12px;">${title}</b>`,
		content: content,
		draggable: false,
		useBootstrap: true,
		columnClass: 'col-xl-8 col-lg-8  col-md-10 col-sm-10 col-12',
		typeAnimated: true,
		contentLoaded: contentLoaded,
		onContentReady: onContentReady,
	});
};

Component.DOM.htmlContent_ = function(theme = "light",title, content, contentLoaded, onContentReady){
	$.dialog({
		theme: theme,
		title: `${title}`,
		content: content,
		draggable: false,
		useBootstrap: true,
		columnClass: 'col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12'
	});
};

Component.DOM.msgText = (theme, content="", title)=>{
	$.dialog({
		theme: theme,
		title: `<img src="${logo}" style="max-height: 30px;" /> <b style="font-size:12px;">${title}</b>`,
		content: `<div class="col-12 text-center" style="border:0px solid #DDD;padding:5px;font-family:arial black;font-size:12px;">
		${content}
		</div>`,
		draggable: false,
		useBootstrap: true,
		typeAnimated: true,
		columnClass: 'col-xl-4 col-lg-5  col-md-6 col-sm-7 col-12'
	});
};

Component.DOM.checkInputForm = (inputs)=> {

	let errors = [];

	for(let i=0; i<= inputs.length - 1; i++){

		let input = inputs[i];

		if(input.value === ""){

			errors.push(i);

			if(input.hasAttribute("id") && (input.getAttribute("id") === "specialContent")){

				document.querySelector(".tox-tinymce").style.border = "1px solid red";
			}
			input.classList.add("is-invalid");
		}
	}

	return errors;
}

Component.DOM.Validator = {

	errors: [],

	inputs: [],

	lists: (inputs)=>{

		Validator.errors = [];

		Validator.inputs = inputs;

		return Validator;

	},

	isEmpty: ()=> {
	
		let inputs = Validator.inputs;

		for(let i=0; i<= inputs.length - 1; i++){
	
			let input = inputs[i];
	
			if(input.value === ""){

				let ob = {};

				ob[input.getAttribute("name")] = input.value;

				ob["etat"] = "Empty";
	
				Validator.errors.push(ob);
	
				if(input.hasAttribute("id") && (input.getAttribute("id") === "specialContent")){
	
					document.querySelector(".tox-tinymce").style.border = "1px solid red";
				}
				input.classList.add("is-invalid");
			}
		}
	
		return Validator;
	},

	sameValue: (target_1, target_2)=> {
	
			if(target_1.value !== target_2.value){

				let ob = {};

				ob[target_1.getAttribute("name")] = target.value;

				ob["etat"] = target_1.getAttribute("name")+" different de "+target_2.getAttribute("name");
	
				Validator.errors.push(ob);
	
				target_2.classList.add("is-invalid");
			}
	
		return Validator;
	},

	isMail: (target)=> {

		let regex = /([a-z0-9-_]*)\@([a-z0-9-_]*)\.([a-z]){2,5}/;
	
			if(!regex.test(target.value)){

				let ob = {};

				ob[target.getAttribute("name")] = target.value;
				
				ob["etat"] = target.getAttribute("name")+" n'est pas un email";
	
				Validator.errors.push(ob);				
				
				target.classList.add("is-invalid");
			}
	
		return Validator;
	},

	isDate: (target)=>{

		let regex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
		
		if(!regex.test(target.value)){

				let ob = {};

				ob[target.getAttribute("name")] = target.value;
				
				ob["etat"] = target.getAttribute("name")+" n'est pas une date";
	
				Validator.errors.push(ob);			
				
				target.classList.add("is-invalid");
		}

	return Validator;
   
	},

	isNumber: (target)=>{

		let regex = /^([0-9]*)$/;
		
		if(!regex.test(target.value)){

			let ob = {};

			ob[target.getAttribute("name")] = target.value;
			
			ob["etat"] = target.getAttribute("name")+" n'est pas un nombre";

			Validator.errors.push(ob);			
			
			target.classList.add("is-invalid");
		}

	return Validator;
   
	}

};


Component.DOM.wait = ()=> {
	$("#msg").slideDown(300).html(spinner("loading_x")).addClass("alert-light");
}
Component.DOM.waitStop = ()=> {
	setTimeout(()=>{
		$("#msg").slideUp(300);
	}, 50);

}

Component.DOM.msgSuccess = (msg)=> {
	$("#msg").slideDown(300).html("<i class='fa fa-check'></i> "+msg).addClass("alert-success");
	setTimeout(()=>{
	$("#msg").slideUp(300);
	}, 2000);
}
Component.DOM.msgError = (msg)=> {
	$("#msg").slideDown(300).html("<i class='fa fa-exclamation-triangle'></i> "+msg).addClass("alert-danger");
	setTimeout(()=>{
		$("#msg").slideUp(300);
		}, 2000);
}
Component.DOM.success = (Alertvalue, title = "")=> {
	msgText("light", Alertvalue, title);
}
Component.DOM.error = (Alertvalue, title = "")=> {
	msgText("dark", Alertvalue, title);
}




//////////////////////////////////////////////////////////////////////////////////////

Component.DOM.imgViewByUrl_withPDF = (taget, index, parent = null)=> {

	let img = new FileReader();
	img.onload = (e) => {
		if (taget.files[0].type === "image/jpg" ||
			taget.files[0].type === "image/JPG" ||
			taget.files[0].type === "image/png" ||
			taget.files[0].type === "image/PNG" ||
			taget.files[0].type === "image/jpeg" ||
			taget.files[0].type === "application/pdf" ||
			taget.files[0].type === "application/PDF" ||
			taget.files[0].type === "image/JPEG") {

			sessionStorage.setItem("img_" + index, _("." + parent + " #img_" + index).getAttribute("src"));

			_("." + parent + " #img_" + index).setAttribute("src", e.target.result)
			if (_("." + parent + " #light_" + index) !== null) {
				_("." + parent + " #light_" + index).setAttribute("href", e.target.result)
			}
			if (_("." + parent + " #remove_" + index) !== null) {

				_("." + parent + " #remove_" + index).classList.replace("fa-trash", "fa-reply")
				_("." + parent + " #remove_" + index).setAttribute("title", "Annuler l'opération")
			}
		}
	}
	img.readAsDataURL(taget.files[0])
}


Component.DOM.imgViewByUrl = (taget, index, parent=null)=> {

	let img = new FileReader();
	img.onload = (e) => {
		if (taget.files[0].type === "image/jpg" ||
			taget.files[0].type === "image/JPG" ||
			taget.files[0].type === "image/png" ||
			taget.files[0].type === "image/PNG" ||
			taget.files[0].type === "image/jpeg" ||
			taget.files[0].type === "image/JPEG") {
			
			sessionStorage.setItem("img_" + index, _("." + parent + " #img_" + index).getAttribute("src"));
			
			_("."+parent+" #img_" + index).setAttribute("src", e.target.result)
			if (_("."+parent +" #light_" + index)!==null){
				_("." + parent +" #light_" + index).setAttribute("href", e.target.result)
			}
			if (_("."+parent +" #remove_" + index) !== null) {
				
				_("."+parent +" #remove_" + index).classList.replace("fa-trash", "fa-reply")
				_("."+parent +" #remove_" + index).setAttribute("title", "Annuler l'opération")
			}
		}
	}
	img.readAsDataURL(taget.files[0])
}

Component.DOM.imgView = (taget, name)=> {

	let img = new FileReader();
	img.onload = (e) => {

		if (taget.files[0].type === "image/jpg" || 
		taget.files[0].type=== "image/JPG" || 
		taget.files[0].type==="image/png" || 
		taget.files[0].type==="image/PNG" || 
		taget.files[0].type==="image/jpeg" || 
		taget.files[0].type==="image/JPEG" )
		{

			let balise = document.getElementById(name)
			balise.innerHTML = '<img src=' + e.target.result + ' style="max-width:100%; max-height:100%;"/>'
		}

		}
	
	img.readAsDataURL(taget.files[0])
}

Component.DOM.viewAll= function(taget, name) {

	let img = new FileReader();
	img.onload = (e) => {

			let balises = null;
			if(document.querySelectorAll("#"+name) != null)
				balises = document.querySelectorAll("#"+name)
			if(document.querySelectorAll("."+name) != null)
				balises = document.querySelectorAll("#"+name)

			balises.forEach(balise =>{

				balise.innerHTML = spinner("loading_x")
				setTimeout(()=>{
					balise.innerHTML = "<embed type='" + taget.files[0].type + "' src='" + e.target.result + "' style='max-width:100%; max-height: 80%;'/>"
					if(balise.style.background){
						balise.style.removeProperty("background")
					}
						balise.style.border = 0;
						balise.querySelector("embed").style.border = "1px solid #DDD"

				}, 1500)

			})
			

	}
	img.readAsDataURL(taget.files[0])
}

Component.DOM.imgViews = function(taget, name) {

	if (taget.files){

		let nbFiles = taget.files.length

		let balise2 = $("#" + name)
		_("#" + name).innerHTML="";

		for (let index = 0; index < taget.files.length; index++) {

			let order = 1;

				let reader = new FileReader()
				reader.onload = (e) => {
					if (taget.files[index].type === "image/jpg" ||
						taget.files[index].type=== "image/JPG" ||
						taget.files[index].type==="image/png" ||
						taget.files[index].type==="image/PNG" ||
						taget.files[index].type==="image/jpeg" ||
						taget.files[index].type==="image/JPEG" )
					{
					balise2.append('<img src=' + e.target.result + ' title="Image '+(order+index)+'" data-target="tooltip" style="max-width:100%; max-height:100%; margin-right: 10px; cursor: pointer;"/>')
					}
				}
				reader.readAsDataURL(taget.files[index])
		
		}
	}

}

/*
Component.DOM.imageViewWithoutEmbed = function(selectorTochange, selectorCurrent, attr="src"){
	selectorTochange.setAttribute(attr, selectorCurrent.getAttribute(attr))
}


Component.DOM.fileViewWithEmbed = function(tagetInputFile, selectorInshow){

	let file = new FileReader();
	file.onload = (e) => {
		let target = document.querySelector(selectorInshow);
		target.innerHTML = "<embed src=" + e.target.result + " width=100% height=100% type='application/pdf'/>"
	}
	file.readAsDataURL(tagetInputFile.files[0]);
}
*/