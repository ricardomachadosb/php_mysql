<?php

include('../header.php');
include('../autenticacao/SessionController.php');
require_once("../connection.php");
require_once("GrupoDB.php");
//SessionController::endSession();
SessionController::checkSession();
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
$id = $_REQUEST["id"];
$grupo = GrupoDB::findById($id, $conexao);
?>

<div class="container" style="margin-top:20px;">
<h1>Edição de grupo</h1>
	<ul class="breadcrumb">
    	<li> <a href="/loja_project/grupo/list.php" >Listagem </a><span class="divider">/</span></li>
    	<li> <a href="/loja_project/grupo/create.php" >Novo </a><span class="divider">/</span></li>
      <li class="active">Edição</a></span></li>
    </ul>
   <div class="row">
          <div class="col-xs-12">
             <?php 
                if($message){
                  echo "<div class='alert alert-danger' role='alert'>".$message . "</div>";
                }
             ?>
             <form autocomplete="off" id="login-form" method="post" action="/loja_project/grupo/update.php" role="form">
                   <div class="form-group">
                      <label for="Id">Identificador</label>
                      <?php
                        echo "<input type='number' placeholder='Identificador'  class='form-control' id='id' name='id' value='". $grupo->getIdGrupo() ."'>"
                      ?>
                      
                  </div>
                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <?php 
                        echo "<input placeholder='Nome do Grupo'  class='form-control' id='nome' name='nome' value='". $grupo->getNome() ."'>"
                      ?>
                  </div>
                  <?php 
                  echo "<input type='hidden' name='oldId' value='".$id ."'>";
                  ?>
                  <input type="submit" value="Salvar" class="btn btn-custom btn-lg btn-block" id="btn-login">
              </form>
          </div>
    </div>
  </div>


<?php


include('../footer.php');

?>