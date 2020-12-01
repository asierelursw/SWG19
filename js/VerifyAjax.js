function VerificarVip() {
    var email = document.getElementById('user_mail').value;
    var bool = false;
    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/ClientVerifyEnrollment.php?email=" + email, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200)
            document.getElementById("vip").innerHTML = xhr.responseText;
        if (xhr.responseText == "<p style='color:green;'> Usuario Vip </p>") {
            bool = true;
            //document.getElementById('Enviar').disabled = false;
        } else {
            bool = false;
            //document.getElementById('Enviar').disabled = true;
        }
    };
    xhr.send("");
    return bool;
}

function VarificarPass() {

    var pass = document.getElementById('pass1').value;
    var bool = false;

    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/ClientVerifyPass.php?pass1=" + pass, true);
    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200)
            document.getElementById("validpass").innerHTML = xhr.responseText;

        if (xhr.responseText == "<p style='color:green;'> Contraseña Valida </p>") {
            bool = true;
            //document.getElementById('Enviar').disabled = false;
        } else {
            bool = false;
            //document.getElementById('Enviar').disabled = true;

        }

    };
    xhr.send("");
    return bool;
}

function activar() {
    var pass = document.getElementById('validpass').value;
    var email = document.getElementById('vip').value;
    if ((VerificarVip() == false && VarificarPass() == false) || (VerificarVip() == false) || (VarificarPass() == false)) {
        document.getElementById('Enviar').disabled = true;
    } else {
        document.getElementById('Enviar').disabled = false;
    }
}