
        XMLHttpRequestObject2 = new XMLHttpRequest();
        XMLHttpRequestObject2.onreadystatechange = function(){
            //alert (XMLHttpRequestObject.readyState);
            if (XMLHttpRequestObject2.readyState==4){
                var obj2 = document.getElementById('resultado');
                obj2.innerHTML = XMLHttpRequestObject2.responseText;
            }
        }

function preguntasXml(){
    XMLHttpRequestObject2.open("GET",'tabla.php');
    XMLHttpRequestObject2.send(null);

}
