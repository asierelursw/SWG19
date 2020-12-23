  
function CambiarContraseña() {
    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    $email = document.getElementById("user_mail").value;
    xhr.open("GET", "../php/Email.php?user_mail=" + $email, true);
    xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        if (result == "Correcto") {
          document.getElementById("feedback").innerHTML =
            "El mensaje debería llegarle próximamente a su bandeja de mensajes";
        } else if (result == "Correo no está en la BD"){
            document.getElementById("feedback").innerHTML = "El correo no está registrado en la base de datos";
        } else if (result == "Introduce un correo antes de continuar!"){
              document.getElementById("feedback").innerHTML = "Introduce un correo antes de continuar!";
        }else{
              document.getElementById("feedback").innerHTML = "Ha surgido un error desconocido";
          }
    }
    };
    xhr.send("");
  }