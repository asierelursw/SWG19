setInterval(function () {
	if (XMLHttpRequest)
		xhr = new XMLHttpRequest();
	xhr.open('GET', '../php/CountXMLQuestions.php?email=' + document.getElementById('mail').value, true);
	xhr.onreadystatechange = function () {

		if (xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById('contPreguntas').innerHTML = xhr.responseText;
		}
	}
	xhr.send('');
}, 10000);