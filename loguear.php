<?php
session_start();


	require_once ("db.inc");
	require_once ("utils.inc");
	if (isset($_SERVER['REQUEST_METHOD'])){
		$method= $_SERVER['REQUEST_METHOD'];
		switch ($method) {
			case 'POST':
				if(isset($_POST["campoUser"]) && ($_POST["campoUser"] != "")){ 
					$pass=$_POST["password"];
					$name=$_POST["campoUser"];
					
					$succeed=_login($name,$pass);

					
					if($succeed['login']==true){
						$_SESSION["login"] = true;
						$_SESSION["nombre"] = $name;
						$_SESSION["loginError"] = false;
						
					}
					else{
						$_SESSION["login"] = false;
						$_SESSION["loginError"] = true;	
					}

					echo json_encode($succeed);
				}
				
				break;
			
			default:
				# code...
				break;
		}

	}


?>