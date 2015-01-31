<?php
	require_once("../connection.php");
	require_once("GrupoDB.php");

	$id = $_REQUEST["id"];
	$ret = GrupoDB::delete($id, $conexao);
	echo $ret;
?>