<?php

//Inicio del procesamiento
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>	
<script type="text/javascript">
function correoValido(correo){
	if(!(/\w+[@]\w+[.]\w/.test(correo))){
		return false;
	}
	else return true;

}
function usuarioExiste(data , status){
	
	if(status=="success"){
		if (data=="disponible") {
			document.getElementById('imguser').src="img/ok.png";
		}else{
			document.getElementById('imguser').src="img/no.png";
			alert("Usuario reservado");
		}
		

	}

}

$(document).ready(function(){
	$("#campoUser").change(function(){
	var url="comprobarUsuario.php?user=" + $("#campoUser").val();
	alert("url"+ url);
	$.get(url,usuarioExiste);


	});	

	$("#campoEmail").change(function(){
				if	(	correoValido($("#campoEmail").val()	)	)	{
								//	Ocultar	icono	rojo

								$("#imgcorreo").attr("src","img/ok.png");
								//	Mostrar	icono	verde
				}	else	{
				 			//	Ocultar	icono	verde
				 				$("#imgcorreo").attr("src","img/no.png");
				 				alert("Correo no válido");
					 		//	Mostrar	icono	rojo
				}
	});
	$("#botonReg").click(function(){
		var campoEmail=document.getElementById('campoEmail').value;
		var campoUser=document.getElementById('campoUser').value;
		var password=document.getElementById('campoPass').value;

		$.ajax({

			url: "registrarUser.php",
			dataType:"json",
			type: "POST",
			data:{

				campoEmail : campoEmail,
				campoUser : campoUser,
				password : password

			},

			success: function(data){
					window.location.href="index.php";
			}

		});

	});

});




</script>

<title>Portada</title>
</head>

<body>
						

<div id="contenedor">

<?php
	require("cabecera.php");
	
?>

	<div id="contenido">
		<h1>Registro de nuevo usuario</h1>
		
		<form id="registro" method="POST">
		<fieldset>
		<legend>Datos del usuario</legend>
		<p><label>Correo:</label> <input type="text" name="campoEmail" id="campoEmail" /><img id="imgcorreo"src="img/no.png"></p>
		<p><label>User:</label> <input type="text" name="campoUser" id="campoUser" /><img id="imguser" src="img/no.png"></p>
		<p><label>Password:</label> <input type="password" name="password" id="campoPass" /><br /></p>
		<button type="submit" id="botonReg">Registrar</button> 
		</fieldset>


	</div>


</div>

</body>
</html>