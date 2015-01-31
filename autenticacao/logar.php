<?php
	require_once("../connection.php");
	require_once("AutenticacaoDB.php");
	include('SessionController.php');

	$login = $_REQUEST["login"];
	$password = $_REQUEST["password"];
	$auth = AutenticacaoDB::checkAuth($login, $password, $conexao);
	if($auth){
		SessionController::initSession();
		header("Location: ../home.php?userName=" . $login);
	}else {
		header("Location: ../index.php?erro=true");
	}
?>