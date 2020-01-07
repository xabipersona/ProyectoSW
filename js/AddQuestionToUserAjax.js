$(document).ready(function(){   
    setInterval(verNumeroPreguntas,5000);
});


function  verNumeroPreguntas(){
    var numpreguntas = 0;
    var numemail = 0;
    var email = $('#dirCorreo').val();
    $.ajax({
        type: "GET",
        url:"../xml/Questions.xml",
        dataType: "xml",
        async: false,
        cache: false,
        success: function(xml){
            $(xml).find("assessmentItem").each(function(){
            emailXml = $(this).attr('author');
            if(email.valueOf()==emailXml.valueOf()){
                numemail += 1;
            }
                numpreguntas += 1;
        });
            $('#tablausers').empty();
            $('#tablausers').append("<a>"+numemail+"</a> / <a>"+numpreguntas+"</a>");
    }
        
    });   
}