function VerificarVip() {
    var email = document.getElementById('user_mail').value;
    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/ClientVerifyEnrollment.php?email=" + email, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200)
		if (xhr.responseText == "SI") {
			document.getElementById('vip').style.color = 'darkgreen';
			document.getElementById('vip').innerHTML = '<p style=\'color:green;\'> Usuario Vip </p>';
		} else if (xhr.responseText == 'NO'){
			document.getElementById('vip').style.color = 'darkred';
			document.getElementById('vip').innerHTML = '<p style=\'color:red;\'> Usuario No Vip </p>';
		} else {
			document.getElementById('vip').style.color = 'darkred';
			document.getElementById('vip').innerHTML = 'Sin servicio';
		}
	}
	xhr.send('');
}
function VarificarPass() {

    var pass = document.getElementById('pass1').value;

    if (XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/ClientVerifyPass.php?pass1=" + pass, true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
			if(xhr.responseText == 'VALIDA'){
				document.getElementById('validpass').innerHTML = '<p style=\'color:green;\'> Contraseña Valida </p>';
			}else if(xhr.responseText == 'INVALIDA'){
				document.getElementById('validpass').innerHTML = '<p style=\'color:red;\'> Contraseña No Valida </p>';
			}else if(xhr.responseText=="Fuera de Servicio"){
				document.getElementById('validpass').innerHTML = '<p style=\'color:blue;\'> Fuera de Servicio </p>';
			}
		}
	}
	xhr.send('');
}

function vanLas2(){
	$x = document.getElementById('validpass').innerHTML;
	$y = document.getElementById('vip').innerHTML;
	if($x=="<p style=\'color:green;\'> Usuario Vip </p>" && $y=="<p style=\'color:green;\'> Contraseña Valida </p>"){
		document.getElementById('Enviar').disabled=false;
	}else{
		document.getElementById('Enviar').disabled=true;
	}
}