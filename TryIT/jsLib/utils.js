function trace(s) {
	window.console && console.log(s);
}

function show(refOrId,display) {
	// affiche l'Ã©lÃ©ment dont la rÃ©fÃ©rence ou l'id est fourni
	// le paramÃ¨tre display doit valoir block par dÃ©faut

	if (typeof refOrId == "string") {
		refOrId = document.getElementById(refOrId);
	}

	if (display == undefined) 
		display = "block";

	refOrId.style.display = display;
}

function hide(refOrId) {
	// cache l'Ã©lÃ©ment dont la rÃ©fÃ©rence ou l'id est fourni
	
	if (typeof refOrId == "string") {
		refOrId = document.getElementById(refOrId);
	}
	refOrId.style.display = "none";
}

function html(refOrId, val) {
	// affecte une valeur Ã  l'Ã©lÃ©ment dont la rÃ©fÃ©rence ou l'id est fourni; si val n'est pas fourni, on renvoie son contenu

	if (typeof refOrId == "string") {
		refOrId = document.getElementById(refOrId);
	}

	if (val == undefined) return refOrId.innerHTML; 
	else refOrId.innerHTML = val; 
}

function val(refOrId, val) {
	// affecte une valeur Ã  l'Ã©lÃ©ment dont la rÃ©fÃ©rence ou l'id est fourni; si val n'est pas fourni, on renvoie son contenu
	// l'Ã©lÃ©ment est un champ de formulaire

	if (typeof refOrId == "string") {
		refOrId = document.getElementById(refOrId);
	}

	if ( (refOrId.type == "checkbox") || (refOrId.type == "radio")) {
		if (val == undefined) return refOrId.checked; 
		else refOrId.checked = val; 
	} else {
		if (val == undefined) return refOrId.value; 
		else refOrId.value = val; 
	}
}


function mkDebug() {

	var compteur_interne_non_global=0;
	// var locale de la fonction mkDebug
	
	var fnDebug = function(s, reset){
		// scope de cette fonction : 
		// tout ce que peut "voir" la fonction 
		// ses propres variables locales (qui ne sont pas persistantes) 
		// les variables globales 
		// ET la variable compteur_interne_non_global !!

		if ((reset != undefined) && (reset == true)){
			compteur_interne_non_global=0;
		}
		
		if (compteur_interne_non_global<5) {
			trace(compteur_interne_non_global  + ": " + s);
			compteur_interne_non_global++;   
		}
	} 
	
	return fnDebug; 
}

var debug = mkDebug(); 

var oDebug = (function (seuil) {
	// seuil est variable locale de mkDebug
	var compteur_interne=0;
	if (seuil==undefined) seuil=5;
	
	return {
		"trace" : function(s) {
			if (compteur_interne<seuil) trace(compteur_interne + ": " + 	s);
			compteur_interne++; 
		}, 
		resetCompteur : function(){
			compteur_interne = 0; 
		},
		setCompteur : function(c){
			compteur_interne = c; 
		},
		setMax : function(s){
			seuil = s;
		},
		getCompteur : function(){
			return compteur_interne;
		},
		getMax : function(){
			return seuil;
		}
	}; 
}) (3); 


trace("Chargement de utils.js : html, val, show, hide, debug, oDebug");






