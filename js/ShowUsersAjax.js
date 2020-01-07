
        XMLHttpRequestObject = new XMLHttpRequest();
        XMLHttpRequestObject.onreadystatechange = function(){
            //alert (XMLHttpRequestObject.readyState);
            if (XMLHttpRequestObject.readyState==4){
                var obj = document.getElementById('tablausers');
                obj.innerHTML = XMLHttpRequestObject.responseText;
            }
        }

function usersXml(){
    XMLHttpRequestObject.open("GET",'TablaUsersConectados.php');
    XMLHttpRequestObject.send(null);
}
