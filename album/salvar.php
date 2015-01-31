<?php
	require_once("../connection.php");
	require_once("AlbumDB.php");

	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	$ano =   $_REQUEST["ano"];
	$quantidadeEstoque =   $_REQUEST["quantidadeEstoque"];
	$valor =   $_REQUEST["valor"];
	$idGrupo =   $_REQUEST["idGrupo"];
	
	AlbumDB::salvar($id, $nome, $ano, $quantidadeEstoque, $valor, $idGrupo, $conexao);
?>