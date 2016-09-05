<?php 

require_once 'db.inc';

function _insertUser($name,$email,$pass){

	_db_connect();

	$query= "SELECT Count(*) FROM usuario WHERE correo='$email'";
	$resultado= _db_query($query);
	$campo=_db_fetch_array($resultado);
	$existe = current($campo);

	if ($existe == 0 ){
		$query= "INSERT INTO usuario(nombre, correo, pass) VALUES ('$name', '$email', '$pass')";
		_db_query($query);
		_db_close();
		$arr= array('insertado'=> true);
		return $arr;
	}
	else{
		_db_close();
		$arr= array('insertado'=>false);
		return $arr;
	}
	
}

function _login($name,$pass){

	_db_connect();

	$query= "SELECT id FROM usuario WHERE nombre='$name' and pass='$pass'";
	$resultado= _db_query($query);
	$campo=_db_fetch_array($resultado);
	$existe = current($campo);

	if ($existe != 0 ){
		_db_close();
		$arr= array('login'=> true, 'id'=> $existe);
		return $arr;
	}
	else{
		_db_close();
		$arr= array('login'=>false);
		return $arr;
	}
	
}

function _enviarTweet($id,$texto){
	_db_connect();

	$query= "INSERT INTO tweet(texto, idusuario) VALUES ('$texto', '$id')";
	if(_db_query($query)){
		_db_close();
		$arr= array('insertado'=> true);
	}else{
		$arr= array('insertado'=> false );
	}
	return $arr;
}

function _dameTweets(){
	_db_connect();

	$query= "SELECT tweet.texto, tweet.fecha, usuario.nombre FROM tweet INNER JOIN usuario ON tweet.idusuario=usuario.id ORDER BY tweet.fecha DESC";
	$resultado= _db_query($query);
	
	$filas = _db_num_rows($resultado);
	$res=array('filas' => $filas);
 	for($i= 0 ; $i<$filas ; $i++){
 		$res[$i]=_db_fetch_array($resultado);
 	}
 	_db_close();
 	return $res;


}

function _cambioFecha($fecha){
	$nf = explode("-", $fecha);
	$año = "$nf[0]";
	$mes = "$nf[1]";
	$dia = "$nf[2]";
	$dia = explode(" ",$dia);
	$dia = "$dia[0]";

	return "$dia-$mes-$año";
}
function _dameHora($fecha){
	$nh = explode(" ", $fecha);
	$hora = "$nh[1]";
	return $hora;
}

?>