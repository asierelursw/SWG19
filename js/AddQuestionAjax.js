function AñadirPregunta(){
    xhr = new XMLHttpRequestObject();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status==200){
            xhr.open("POST","AddQuestion.php?email="+$email, true);
            xhr.send();
        }
    }
}
//Este con XmlHttpRequest