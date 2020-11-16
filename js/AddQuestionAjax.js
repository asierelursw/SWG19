function AñadirPregunta(){
    xhr = new XMLHttpRequestObject();
    
    	xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status==200){
        	var formulario = $("fquestion").serialize();
            xhr.open("POST","AddQuestion.php", true);
            xhr.send(formulario);
        }
        return false;
    }
}
//Este con XmlHttpRequest