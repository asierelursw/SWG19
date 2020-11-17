/*function AñadirPregunta(){
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
*/
$(document).ready(function() {
    $('#Enviar').click(function(event) {

        if (validar()) {
            var formu = document.getElementById("fquestion");
            //var datos = new FormData(formu);
            var datos = $('form').serialize();
            var email = document.getElementById('mail').value;

            $.ajax({
                type: 'POST',
                //enctype: 'multipart/form-data',
                url: '../php/AddQuestion.php?email=' + email,
                data: datos,
                processData: false,
                contType: false,
                cache: false,
                timeOut: 200000,
                beforeSend: function() { $("#result").html('<div><img src="loading.gif"/></div>'); },
                success: function(data) {
                    alert("Pregunta guardada exitosamente");
                    $("#result").click(VerPreguntas());
                },
                error: function() {
                    alert("error");
                    $("#result").fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
                }
            });
        }
    })
});