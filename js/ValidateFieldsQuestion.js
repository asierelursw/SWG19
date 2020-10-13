        			
		function validar(){
            var email = $("#mail").val();
			var p = $("#pregunta").val();
            var rc = $("#correcta").val();
            var rf1 = $("#falsa1").val();
            var rf2 = $("#falsa2").val();
            var rf3 = $("#falsa3").val(); 
            var tema = $("#tema").val();           
            if(email == "" || p == "" || rc == "" || rf1 == "" || rf2 == "" || rf3 == "" || tema == ""){
                alert("rellene los campos obligatorios");
                return false;
            }
            if(p.length<10){
                    alert("Introduzca una pregunta valida");
                return false;
            }
            var teacher = '/^[a-zA-Z]+(.[a-zA-Z]+@ehu.(eus|es)|@ehu.(eus|es))$/';
            var alumno = '/^[a-zA-Z]+(([0-9]{3})+@ikasle.ehu.(eus|es))$/';
            if(!(teacher.test(email) || alumno.test(email))){  
                alert("Introduzca un email valido");     
                return false;
            }
            //alert("bieen");            
            return true;
            
        }
        function Borrar() {
            
            document.getElementById('mail').value = "";
            document.getElementById('pregunta').value = "";
            document.getElementById('correcta').value = "";
            document.getElementById('falsa1').value = "";
            document.getElementById('falsa2').value = "";
            document.getElementById('falsa3').value = "";
        }

         
 