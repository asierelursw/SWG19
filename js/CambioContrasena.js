  
function CambiarContraseña() {
    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    $email = document.getElementById("user_mail").value;
    xhr.open("GET", "../php/Email.php?user_mail=" + $email, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        
        if (xhr.responseText == "Correcto") {
          document.getElementById("feedback").innerHTML =
            "El mensaje debería llegarle próximamente a su bandeja de mensajes";
        } else if (xhr.responseText == "Correo no está en la BD"){
            document.getElementById("feedback").innerHTML = "El correo no está registrado en la base de datos";
        } else if (xhr.responseText == "Introduce un correo antes de continuar!"){
              document.getElementById("feedback").innerHTML = "Introduce un correo antes de continuar!";
        }else if(xhr.responseText == "acruz024@ikasle.ehu.eus"){
          document.getElementById("feedback").innerHTML = "email";
        }else{
              document.getElementById("feedback").innerHTML = "Ha surgido un error desconocido";
        }
      }  
    };
    xhr.send("");
  }