setInterval(function () {
	if (XMLHttpRequest)
		xhr = new XMLHttpRequest();
	xhr.open('GET', '../php/SignUp.php', true);
	xhr.onreadystatechange = function () {
		
		if (xhr.readyState == 4 && xhr.status == 200) {
			
			if(document.getElementById('validpass').innerText == 'Contraseña Valida' && document.getElementById('vip').innerText =='Usuario Vip'){
				document.getElementById('Enviar').disabled=false;
			}else{
				document.getElementById('Enviar').disabled=true;
			}			
			
		}
	}
	xhr.send('');
}, 2000);