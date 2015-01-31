<?php
	class Faixa {
		private $idFaixa;
		private $idAlbum;
		private $duracao;
		private $nome;

		

		function __construct($auxIdFaixa, $auxIdAlbum, $auxDuracao, $auxNome){
			$this->idFaixa = $auxIdFaixa;
			$this->idAlbum = $auxIdAlbum;
			$this->duracao = $auxDuracao;
			$this->nome = $auxNome;
		}

		function getIdFaixa(){
			return $this->idFaixa;
		}

		function getIdAlbum(){
			return $this->idAlbum;
		}

		function getDuracao(){
			return $this->duracao;
		}

		function getNome(){
			return $this->nome;
		}

		function setIdFaixa($auxIdFaixa){
			$this->idFaixa = $auxIdFaixa;
		}

		function setIdAlbum($auxIdAlbum){
			$this->idAlbum = $auxIdAlbum;
		}

		function setDuracao($auxDuracao){
			$this->duracao = $auxDuracao;
		}

		function setNome($auxNome){
			$this->nome = $auxNome;
		}
	}
?>