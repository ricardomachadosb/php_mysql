<?php
	class Grupo {
		private $idGrupo;
		private $nome;

		function __construct($auxIdGrupo, $auxNome){
			$this->idGrupo = $auxIdGrupo;
			$this->nome = $auxNome;
		}

		function getIdGrupo(){
			return $this->idGrupo;
		}
		function getNome(){
			return $this->nome;
		}

		function setIdGrupo($auxIdGrupo){
			$this->idGrupo = $auxIdGrupo;
		}
		function setNome($auxNome){
			$this->nome = $auxNome;
		}
	}
?>