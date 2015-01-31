<?php
	require_once("../connection.php");
	require_once("FaixaDB.php");

	$id = $_REQUEST["id"];
	FaixaDB::delete($id, $conexao);
?>