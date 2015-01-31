<?php

include('../header.php');
include('../autenticacao/SessionController.php');
include('FaixaDB.php');
include('../album/AlbumDB.php');
//SessionController::endSession();
SessionController::checkSession();
require_once("../connection.php");
$faixaList = FaixaDB::listar($conexao);
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
?>

<div class="container" style="margin-top:20px;">
<h1>Listagem de Faixa</h1>
	<ul class="breadcrumb">
    	<li class="active">Listagem <span class="divider">/</span></li>
    	<li><a href="/loja_project/faixa/create.php">Novo</a></span></li>
    </ul>
     <?php 
        if($message){
          echo "<div class='alert alert-success' role='alert'>".$message . "</div>";
        }
     ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Identificador</th>
          <th>Nome</th>
          <th>Album</th>
          <th>Duracao</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($faixaList as $value) {
        echo "<tr>";
          echo "<td>" . $value->getIdFaixa()  ."</td>";
          echo "<td>" . $value->getNome()  ."</td>";
          echo "<td>" . AlbumDB::findNameById($value->getIdAlbum(), $conexao)."</td>";
          echo "<td>" . $value->getDuracao()  ." Segundos</td>";

          echo "<td class='col-md-2'>";
            echo "<a href='/loja_project/faixa/edit.php?id=".$value->getIdFaixa()."'> <button class='btn btn-default' type='button'>";
            echo "<span aria-hidden='true' class='glyphicon glyphicon-edit'></span>";
            echo "</button></a>";

              echo "<a href='/loja_project/faixa/delete.php?id=".$value->getIdFaixa()."'> <button class='btn btn-default' type='button'>";
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