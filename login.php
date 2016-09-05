
<?php

//Inicio del procesamiento
session_start();


?>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>	
<script type="text/javascript">

$(document).ready(function(){

	$("#botonLog").click(function(){
		var campoUser=document.getElementById('user').value;
		var password=document.getElementById('pass').value;
		$.ajax({
			url: 'loguear.php',
			dataType:"json",
			type: "POST",
			data: {
				campoUser : campoUser,
				password : password

			},
			success: function(r){
				sessionStorage.setItem('id',r.id);
				//if(r.login==true){
				window.location.href="../aw/index.php";
				//}
			}

		});

	});

});

</script>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Portada</title>
</head>

<body>

<div id="contenedor">

<?php
	
	require("cabecera.php");
	function ErrorLogin() {
	
	if(isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
		echo '<div id="contenido">';
		echo '<h1>Se ha registrado correctamente, volver a <a href="../aw/index.php">Inicio<a></h1>';
		echo '</div>';
	}
	else{
		if (isset($_SESSION["loginError"]) && ($_SESSION["loginError"]===true)) {
		echo "Inicio de sesión erroneo. ";
		}
		echo '<div id="contenido">';
		echo '<h1>Acceso al sistema</h1>';
		echo '<form method="POST">';
		echo '<fieldset>';
		echo '<legend>Usuario y contraseña</legend>';
		echo '<p><label>Name:</label> <input type="text" name="username" id="user" /></p>';
		echo '<p><label>Password:</label> <input type="password" name="password"  id="pass"/><br /></p>';
		echo '<button type="submit" name="botonLog" id="botonLog">Entrar</button>';
		echo '</fieldset>';
		echo '</div>';

	}
}
	
?>
<div id="noLogueado">
	<?php
	ErrorLogin();
	?>
</div>
	<!-- <div id="contenido">
		<h1>Acceso al sistema</h1>

		<form method="POST">
		<fieldset>
		<legend>Usuario y contraseña</legend>
		<p><label>Name:</label> <input type="text" name="username" id="user" /></p>
		<p><label>Password:</label> <input type="password" name="password"  id="pass"/><br /></p>
		<button type="submit" name="botonLog" id="botonLog">Entrar</button>
		</fieldset>


	</div>-->



</div>

</body>
</html>