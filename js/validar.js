$(document).ready(function (event) {
    $("form input").change(function comprobar() {
        $("#submit").attr("disabled", true);
        $correo = $('#dirCorreo');
        $.ajax({
            url: "ClientVerifyEnrollment.php?dirCorreo=" + $correo.val(),
            cache: false,
            success: function (resultado) {
                if (resultado == "SI") {
                    $("#avisocorreo").html("Correo VIP");
                    $("#avisocorreo").css("color","green");

                    $contra = $("#pass");


                    if ($contra.val().trim().length >= 6) {
                        var $ticket = 1010;
                        $.ajax({
                            url: "VerifyPassWS.php?contra=" + $contra.val() + "&ticket=" + $ticket,
                            cache: false,
                            datatype: "html",
                            success: function (respuesta) {



                                if (respuesta.trim() == "VALIDA") {

                                    
                                    $("#avisocontrasena").html("Contraseña VÁLIDA");
                                    $("#avisocontrasena").css("color","green");
                                     $("#submit").attr("disabled", false);

                                    var contrasena = $("#pass").val();
                                    var contrasena_rep = $("#passR").val();
                                   
                                } else {
                                    $("#avisocontrasena").html("Contraseña no valida");
                                    $("#avisocontrasena").css("color","red");
                                    $("#submit").attr("disabled", true);

                                }
                            }
                        });
                        
                    }
                } else {
                    $("#avisocorreo").html("Email no VIP");
                    $("#avisocorreo").css("color","red");

                }
                
            }
        });
    });
});