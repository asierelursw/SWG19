
/*function VerPreguntas(email){
    $.ajax({
        url: 'ShowXMLQuestions.php?email='+ email,
        beforeSend:function(){$("#result").html('<div><img src="loading.gif"/></div>');},
        success:function(datos){

        $("#result").fadeIn().html(datos);
        
        },
        error:function(){
        $("#result").fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
        }
        });
}*/
//este con jQuery

function VerPreguntas() {
  if(XMLHttpRequest) xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/ShowXMLQuestions.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200)
      document.getElementById("result").innerHTML = xhr.responseText;
  };
  xhr.send("");
}