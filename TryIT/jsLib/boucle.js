oDefault = {
	periode:10,
	traiter:function(){console.log("traiter");},
	testerPoursuite:function(){return true;}
};

function boucle(oParams) {
	var oConfig = enrichir(oDefault,oParams);
	
	var fnAux = function(){
		if (oConfig.testerPoursuite()) {
			oConfig.traiter();
			window.setTimeout(fnAux, oConfig.periode*1000); 
		}
	};
	
	fnAux();
}

function enrichir(oDefault, oConfig) {
	// renvoie un nouvel objet qui contienne toutes les pptés de oDefault
	// avec pour valeurs celles dans oConfig
	// si elles sont prÃ©sentes, dans oDefault sinon 

	// Attention : on reste sur un clonage superficiel !!

	var aux = {};
	
	for (param in  oDefault) {
		// param prendra pour valeurs successivement 
		// "periode", "fnCbTraitement" puis "fnPoursuite"
		if ( (oConfig!=undefined) && (oConfig[param] != undefined)) {
			aux[param] =  oConfig[param];
		} else aux[param] = oDefault[param]; 
	}

	return aux; 
}

console.log("Chargement lib boucle : boucle({periode,traiter,testerPoursuite}), enrichir");

