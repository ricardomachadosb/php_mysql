<?php
	require_once("../connection.php");
	require_once("AlbumDB.php");

	$oldId = $_REQUEST["oldId"];

	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	$ano =   $_REQUEST["ano"];
	$quantidadeEstoque =   $_REQUEST["quantidadeEstoque"];
	$valor =   $_REQUEST["valor"];
	$idGrupo =   $_REQUEST["idGrupo"];
	
	AlbumDB::update($oldId , $id, $nome, $ano, $quantidadeEstoque, $valor, $idGrupo, $conexao);
?>