
<?php
function mostrarSaludo() {
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Estas registrado como, " . $_SESSION['nombre'] . ".<a href='logout.php'>Logout  </a>";
		echo '<div id="contenido"> ';
		echo '<h1>Publicar nuevo post</h1>';
		echo '<form method="POST">';
		echo '<fieldset>';
		echo '<legend>Escribe lo que sea</legend>';
		echo '<p><textarea rows="5" cols="50" id="textarea">Tu comentario aquí </textarea></p>';
		echo '<button id="enviarTweet" type="submit">Entrar</button>';
		echo '</fieldset>';
		echo '</div>';

	} else {
		echo "No estas registrado. Puedes hacer <a href='login.php'>Login</a> o <a href='registro.php'> Registrarte </a>";
	}
}
?>

<div id="cabecera">
	<h1>Bienvenido a TwitterUCM</h1>
	<div class="saludo">
	<?php
		mostrarSaludo();
	?>
	</div>
</div>

