<?php
	require_once("../connection.php");
	require_once("AlbumDB.php");

	$id = $_REQUEST["id"];
	$ret = AlbumDB::delete($id, $conexao);
	echo $ret;
?>