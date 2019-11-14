$(document).ready(function(){
$('#Enviar').click(function(){
        
      
        var str = $('#formquestion').serialize();
        var enlace1 = '../php/AddQuestionWithImage.php';
        
       

        $.ajax({

            type: 'post' , 
            url: enlace1,
            data: str,
            success:function(){ 
                $('#resultado').load("../php/tabla.php");
            },
            cache: false,
            error:function(){ 
                $('#resultado').html('<p class="error"><strong>El servidor parece que no responde</p>');
            }

        }); 
        });

});