function VerificarVip() {
    var email = document.getElementById('user_mail').value;

    if(XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/ClientVerifyEnrollment.php?email=" + email, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200)
        document.getElementById("vip").innerHTML = xhr.responseText;
        if(xhr.responseText == "<p style='color:green;'> Usuario Vip </p>"){
            document.getElementById('Enviar').disabled=false;
        }else{
            document.getElementById('Enviar').disabled=true;
        }
    };
    xhr.send("");
}

function VarificarPass(){

  var pass = document.getElementById('pass1').value;

  if(XMLHttpRequest) xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/ClientVerifyPass.php?pass1=" + pass, true);
    xhr.onreadystatechange = function () {

      if (xhr.readyState == 4 && xhr.status == 200)
        document.getElementById("validpass").innerHTML = xhr.responseText;

        if(xhr.responseText == "<p style='color:green;'> Contraseña Valida </p>"){
            document.getElementById('Enviar').disabled=false;
        }else{
            document.getElementById('Enviar').disabled=true;
        }

    };
    xhr.send("");
}
