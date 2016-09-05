<?php
session_start();


	require_once ("db.inc");
	require_once ("utils.inc");
	if (isset($_SERVER['REQUEST_METHOD'])){
		$method= $_SERVER['REQUEST_METHOD'];
		switch ($method) {
			case 'POST':
				if( isset($_POST["id"]) && ($_POST["id"] != "") ){ 
					$texto=$_POST["texto"];
					$id=$_POST["id"];
					
					$succeed=_enviarTweet($id,$texto);

					$succeed['tweet']=true;

					echo json_encode($succeed);
				}
				break;
			
			default:
				# code...
				break;
		}

	}



?>