//$(document).ready(function(){

	$("form").submit(function(){
	return validar();
	});
//});



function validar(){

	

	pre= $("#pregunta").val();
	cor= $("#correcta").val();
	inc= $("#incorrecta1").val();
	inc2= $("#incorrecta2").val();
	inc3= $("#incorrecta3").val();

	

	if(pre.length==0 || cor.length==0 || inc.length==0 || inc2.length==0 || inc3.length==0){
		alert("Faltan campos por completar");
		return false;
	
	}
	else if(pre.length<10){
		alert("La pregunta debe ser mínimo de 10 caracteres");
				return false;

	}

	return validarCorreo();
}



function validarCorreo(){

	var validacion = /[a-z]+[0-9]{3}@+(ikasle.ehu.eus|ikasle.ehu.es|ehu.es|ehu.eus)/;
	var correo = $('#correo');
	
	if(validacion.test(correo.val())){
		alert("correcto");
				return true;

		
	}else{
		alert("email incorrecto");
				return false;

		
		
	}
	

}
