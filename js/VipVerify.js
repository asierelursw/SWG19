function VerificarVip() {
    var email = document.getElementById('user_mail').value;

    if(XMLHttpRequest) xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/ClientVerifyEnrollment.php?email=" + email, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200)
        document.getElementById("vip").innerHTML = xhr.responseText;
    };
    xhr.send("");
    
  }