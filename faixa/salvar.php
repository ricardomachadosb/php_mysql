<?php
	require_once("../connection.php");
	require_once("FaixaDB.php");

	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	$duracao = $_REQUEST["duracao"];
	$idAlbum = $_REQUEST["idAlbum"];
	FaixaDB::salvar($id, $nome, $duracao, $idAlbum, $conexao);
?>