<?php
	require_once("../connection.php");
	require_once("GrupoDB.php");

	$oldId = $_REQUEST["oldId"];
	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	GrupoDB::update($oldId , $id, $nome, $conexao);
?>