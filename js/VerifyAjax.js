function VerificarVip() {
    var email = document.getElementById('user_mail').value;
    if (XMLHttpRequest) xhr1 = new XMLHttpRequest();
    xhr1.open("GET", "../php/ClientVerifyEnrollment.php?email=" + email, true);
    xhr1.onreadystatechange = function() {
        if(xhr1.readyState == 4 && xhr1.status == 200)
		if (xhr1.responseText == "SI") {
			document.getElementById('vip').style.color = 'darkgreen';
			document.getElementById('vip').innerHTML = '<p style=\'color:green;\'> Usuario Vip </p>';
		} else if (xhr1.responseText == 'NO'){
			document.getElementById('vip').style.color = 'darkred';
			document.getElementById('vip').innerHTML = '<p style=\'color:red;\'> Usuario No Vip </p>';
		} else {
			document.getElementById('vip').style.color = 'darkred';
			document.getElementById('vip').innerHTML = 'Sin servicio';
		}
	}
	xhr1.send('');
}
function VarificarPass() {

    var pass = document.getElementById('pass1').value;

    if (XMLHttpRequest) xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "../php/ClientVerifyPass.php?pass1=" + pass, true);
    xhr2.onreadystatechange = function() {
        if(xhr2.readyState == 4 && xhr2.status == 200){
			if(xhr2.responseText == 'VALIDA'){
				document.getElementById('validpass').innerHTML = '<p style=\'color:green;\'> Contraseña Valida </p>';
			}else if(xhr2.responseText == 'INVALIDA'){
				document.getElementById('validpass').innerHTML = '<p style=\'color:red;\'> Contraseña No Valida </p>';
			}else if(xhr2.responseText=="Fuera de Servicio"){
				document.getElementById('validpass').innerHTML = '<p style=\'color:blue;\'> Fuera de Servicio </p>';
			}
		}
	}
	xhr2.send('');
}


setInterval(function () {
	if (XMLHttpRequest)
		xhr = new XMLHttpRequest();
	xhr.open('GET', '../php/SignUp.php', true);
	xhr.onreadystatechange = function () {

		if (xhr.readyState == 4 && xhr.status == 200) {
			if(document.getElementById('validpass').value == 'Contraseña Valida' && document.getElementById('vip').value =='Usuario Vip'){
				document.getElementById('Enviar').disabled=false;
			}else{
				document.getElementById('Enviar').disabled=true;
			}			
			
		}
	}
	xhr.send('');
}, 2000);