
        XMLHttpRequestObject = new XMLHttpRequest();
        XMLHttpRequestObject.onreadystatechange = function(){
            //alert (XMLHttpRequestObject.readyState);
            if (XMLHttpRequestObject.readyState==4){
                var obj = document.getElementById('resultado');
                obj.innerHTML = XMLHttpRequestObject.responseText;
            }
        }

function preguntasXml(){
    XMLHttpRequestObject.open("GET",'tabla.php');
    XMLHttpRequestObject.send(null);
}

