<?php
	class Album {
		private $idAlbum;
		private $ano;
		private $quantidadeEstoque;
		private $valor;
		private $idGrupo;
		private $nome;

		function __construct($auxIdAlbum, $auxAno, $auxQuantidadeEstoque, $auxValor, $auxIdGrupo, $auxNome){
			$this->idAlbum = $auxIdAlbum;
			$this->ano = $auxAno;
			$this->quantidadeEstoque = $auxQuantidadeEstoque;
			$this->valor = $auxValor;
			$this->idGrupo = $auxIdGrupo;
			$this->nome = $auxNome;
		}

		function getIdAlbum(){
			return $this->idAlbum;
		}
		function setIdAlbum($idAlbumAux){
			$this->idAlbum = $idAlbumAux;
		}

		function getAno(){
			return $this->ano;
		}
		function setAno(){
			$this->ano = $anoAux;
		}

		function getQuantidadeEstoque(){
			return $this->quantidadeEstoque;
		}
		function setQuantidadeEstoque($auxQuantidadeEstoque){
			$this->quantidadeEstoque = $auxQuantidadeEstoque;
		}


		function getValor(){
			return $this->valor;
		}
		function setValor($auxValor){
			$this->valor = $auxValor;
		}

		function getIdGrupo(){
			return $this->idGrupo;
		}

		function setIdGrupo($auxIdGrupo){
			$this->idGrupo = $auxIdGrupo;
		}

		function getNome(){
			return $this->nome;
		}

		function setNome($auxNome){
			$this->nome = $auxNome;
		}
	}
?>