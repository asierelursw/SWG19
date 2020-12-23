function RestablecerContraseña() {
    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      "../php/RestablecerContraseñaAux.php?email=" +
        document.getElementById("user_mail").value +
        "&Pass=" +
        document.getElementById("pass").value +
        "&Pass2=" +
        document.getElementById("pass2").value +
        "&Code=" +
        document.getElementById("code").value,
      true
    );
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        if (result == "Rellene los campos obligatorios") {
          document.getElementById("feedback").innerHTML =
          "Rellene los campos obligatorios";
        } else {
          if (result == 'El correo no es válido') {
            document.getElementById("feedback").innerHTML = "El correo no es válido";
          } else {
            if (result == "Las contraseñas no coinciden") {
              document.getElementById("feedback").innerHTML =
                "Las contraseñas no coinciden.";
            } else {
              if (result == "Codigo incorrecto") {
                document.getElementById("feedback").innerHTML =
                "Codigo incorrecto";
              } else {
                if (result == "Correcto") {
                  document.getElementById("feedback").innerHTML =
                    "Cambio realizado correctamente!";
                }
              }
            }
          }
        }
      }
    };
    xhr.send("");
  }