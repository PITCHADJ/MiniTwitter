<?php 
//Datos de la conexión
include("data.inc");
$link=null;



function _db_connect(){
	
	global $link;
	$link= mysqli_connect(_DB_HOST, _DB_USER, _DB_PASS) or die ('Could not connect: ' . mysql_error());

	mysqli_select_db($link, _DB_DATABASE) or die ('Could not select database');

	return $link;

}

function _db_close(){
	
	global $link;
	mysqli_close($link);
}

function _db_query($query){
	global $link;

	$result = mysqli_query($link,$query) or die ('Query failed: ' . mysqli_error($link));

	return $result;

}

function _db_free($result){
	mysqli_free_result($result);

}

function _db_num_rows($result){
	return mysqli_num_rows($result);
}

function _db_fetch_array($result){
	return mysqli_fetch_array($result, MYSQL_ASSOC);

}
?>