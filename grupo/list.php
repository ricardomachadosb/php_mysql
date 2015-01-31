<?php

include('../header.php');
include('../autenticacao/SessionController.php');
include('GrupoDB.php');
//SessionController::endSession();
SessionController::checkSession();
require_once("../connection.php");
$grupoList = null;
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}

$filterId = null;
$filterNome = null;
if(isset($_REQUEST["id"]) ){
    $filterId = $_REQUEST["id"];
}
if(isset($_REQUEST["nome"]) ){
    $filterNome = $_REQUEST["nome"];
}

if($filterId || $filterNome){
  if(!$filterId){
    $filterId = "";
  }
  if(!$filterNome){
    $filterNome = "";
  }
  $grupoList = GrupoDB::filtrar($filterId, $filterNome, $conexao);
}else {
  $grupoList = GrupoDB::listar($conexao);
}
?>

<div class="container" style="margin-top:20px;">
<h1>Listagem de Grupo</h1>
	<ul class="breadcrumb">
    	<li class="active">Listagem <span class="divider">/</span></li>
    	<li><a href="/loja_project/grupo/create.php">Novo</a></span></li>
    </ul>


    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Filtros
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">

             <form autocomplete="off" id="login-form" method="post" action="/loja_project/grupo/filtrar.php" role="form">
                   <div class="form-group">
                      <label for="Id">Identificador</label>
                      <input type="number" placeholder="Identificador"  class="form-control" id="id" name="id">
                  </div>
                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <input placeholder="Nome do Grupo"  class="form-control" id="nome" name="nome">
                  </div>
                  <input type="submit" value="Filtrar" class="btn btn-custom btn-lg btn-block" id="btn-login">
              </form>


          </div>
        </div>
      </div>
    </div>



     <?php 
        if($message){
          echo "<div class='alert alert-success' role='alert'>".$message . "</div>";
        }
     ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Identificador</th>
          <th>Nome Grupo</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($grupoList as $value) {
        echo "<tr>";
          echo "<td>" . $value->getIdGrupo()  ."</td>";
          echo "<td>" . $value->getNome()  ."</td>";

          echo "<td class='col-md-2'>";
            echo "<a href='/loja_project/grupo/edit.php?id=".$value->getIdGrupo()."'> <button class='btn btn-default' type='button'>";
            echo "<span aria-hidden='true' class='glyphicon glyphicon-edit'></span>";
            echo "</button></a>";

              echo "<a href='/loja_project/grupo/delete.php?id=".$value->getIdGrupo()."'> <button class='btn btn-default' type='button'>";
            echo "<span aria-hidden='true' class='glyphicon glyphicon-trash'></span>";
            echo "</button></a>";
          echo "</td>";


        echo "<tr>";//. $value->nomeGrupo . "</td>"
      }?>
      </tbody>
    </table>
  </div>


<?php


include_once('../footer.php');

?>