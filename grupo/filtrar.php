<?php
	require_once("../connection.php");
	require_once("GrupoDB.php");

	$id = $_REQUEST["id"];
	$nome = $_REQUEST["nome"];
	header("Location: list.php?id=".$id."&nome=".$nome);
?>