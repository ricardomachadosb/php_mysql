<?php
	require_once("../connection.php");
	require_once("FaixaDB.php");

	$oldId = $_REQUEST["oldId"];
	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	$duracao = $_REQUEST["duracao"];
	$idAlbum = $_REQUEST["idAlbum"];
	FaixaDB::update($oldId, $id, $nome, $duracao, $idAlbum, $conexao);
?>