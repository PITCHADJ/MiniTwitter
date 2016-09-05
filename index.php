
<?php

//Inicio del procesamiento
session_start();

unset($_SESSION["loginError"]);



?>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>	
<script type="text/javascript">

$(document).ready(function(){
	
	setInterval('$("#recarga").load("allTweets.php");', 60000);
	
	$("#enviarTweet").click(function(){
		var texto=document.getElementById('textarea').value;
		var id=sessionStorage.getItem('id');
		$.ajax({
			url: 'enviarTweet.php',
			dataType:"json",
			type: "POST",
			data: {
				texto : texto,
				id : id

			},
			success: function(r){
				alert(r.insertado);

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

?>

	<div id="contenido">
		<h1>Lista de posts recientes</h1>
		<div id="recarga">
		<?php 
			require("allTweets.php");
		?>
		</div>
	</div>



</div>

</body>
</html>