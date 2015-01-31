<?php
class AutenticacaoDB {
	static function checkAuth($login, $password, $conexao){
		$autenticado = false;
		$sql = "select login, senha from autenticacao where login =" . "'" . $login ."'";
		$obj  = $conexao->query($sql);

		

		while ($livroLazy = $obj->fetch_object()) {
			if($livroLazy->senha == md5($password)){
				$autenticado = true;
			}
		}
		return $autenticado;
	}
}
?>