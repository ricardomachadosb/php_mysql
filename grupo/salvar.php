<?php
	require_once("../connection.php");
	require_once("GrupoDB.php");

	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	GrupoDB::salvar($id, $nome, $conexao);
?>