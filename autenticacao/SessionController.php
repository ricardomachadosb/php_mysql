<?php 
	class SessionController {
		static function endSession(){
			session_start();
			session_destroy();
			header("Location: /loja_project/index.php");
		}

		static function checkSession(){
			session_start();

			if($_SESSION['logado'] == true){
				return true;
			}else {
				header("Location: /loja_project/index.php");		
			}
		}

		static function initSession(){

			session_start();
			$_SESSION['logado'] = true;
		}
	}
?>