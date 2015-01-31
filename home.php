<?php

include('header.php');
include('autenticacao/SessionController.php');
//SessionController::endSession();
SessionController::checkSession();
?>

<h1>Seja bem vindo <?php echo $_REQUEST["userName"]?></h1>

<?php


include('footer.php');

?>