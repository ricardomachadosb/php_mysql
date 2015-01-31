<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$dbhost = 'localhost';
$port = 3306;
$dbuser = 'root';
$dbpass = 'ricorico';
$dbname = 'projeto_loja';

$conexao = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $port) or die                      ('Error connecting to mysql');

if (!$conexao) {
	echo ('deu errado');
    die('Não foi possível conectar: ' . mysql_error());
}


//mysql_select_db($dbname);

//$sql = "insert into autenticacao values(default, 'aaa', 'bbb', 1)";

//if ($conexao->query($sql) === TRUE) {
 //   echo "New record created successfully";
//} else {
 //   echo "Error: " . $sql . "<br>" . $conn->error;
//}
?>
