<?php
	class Autenticacao {
		private $idAutenticacao;
		private $login;
		private $senha;

		function __construct($auxIdAutenticacao, $auxLogin, $auxSenha){
			$this->$idAutenticacao = $auxIdAutenticacao;
			$this->login = $auxLogin;
			$this->senha = $auxSenha;
		}

		function getIdAutenticacao(){
			return $this->idAutenticacao;
		}
		function getLogin(){
			return $this->login;
		}
		function getSenha(){
			return $this->senha;
		}

		function setIdAutenticacao($auxIdAutenticacao){
			$this->idAutenticacao = $auxIdAutenticacao;
		}
		function setLogin($auxLogin){
			$this->login = $auxLogin;
		}
		function setSenha($auxSenha){
			$this->senha=$auxSenha;
		}
	}
?>