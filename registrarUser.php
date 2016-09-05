<?php 

	require_once ("db.inc");
	require_once ("utils.inc");

	if (isset($_SERVER['REQUEST_METHOD'])){
		$method= $_SERVER['REQUEST_METHOD'];
		switch ($method) {
			case 'POST':
				if(isset($_POST["campoEmail"]) && ($_POST["campoEmail"] != "")) 
					$email=$_POST["campoEmail"];
					$pass=$_POST["password"];
					$name=$_POST["campoUser"];

					$arr=_insertUser($name,$email,$pass);
					$arr['New'] = true;
					echo json_encode($arr);
				break;
			
			default:
				# code...
				break;
		}

	}



?>