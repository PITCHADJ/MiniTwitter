<?php

require_once ("db.inc");
require_once ("utils.inc");

$arr=_dameTweets();
$filas=$arr['filas'];
for ($i=0; $i < $filas ; $i++) { 
	$hora=_dameHora($arr[$i]['fecha']);
	$fecha=_cambioFecha($arr[$i]['fecha']);
	echo "<div id=tweet> ";
	echo "<p> " . $arr[$i]['texto'] ."</p>";
	echo "<p><i> Tweet creado por " . $arr[$i]['nombre'] . " el día " . $fecha . " a las " . $hora .". </i></p>" ;
	echo "<HR>";
	echo "</div>";
}
return $arr;
?>