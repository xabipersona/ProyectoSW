function validarFormulario(){
    
    var resul = true;
    $("form :input").each(function(){
        var input = $(this);
        if(input.val()==""){
            resul = false;
            alert("El campo "+ "\' "+ input.attr("name")+"\'"+" esta vacio.");

        }else{
            if(input.attr("id")=="dirCorreo"){
                resul = validarCorreo(input.val());
                if(!resul){
                    alert("El correo electronico introducido no es correcto.");
                }
            }else if(input.attr("id")=="nombrePregunta"){
                if(input.val().length<10){
                    alert("El enunciado de la pregunta es demasiado corto.");
                    resul = false;
                }
            }
        }
    });
    return resul;
}

$('document').ready(function(){
    $('#submit').click(function(){
        return validarFormulario();
    });
});

function validarCorreo(correo){

    var regexAlu = /^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$/;
    var regexPro = /^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$/;
    
    if(regexAlu.test(correo)){
        return true;
    }
    else if(regexPro.test(correo)){
        return true;
    }
    return false;
}