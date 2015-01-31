<?php

include('../header.php');
include('../autenticacao/SessionController.php');
include('AlbumDB.php');
include('../grupo/GrupoDB.php');
//SessionController::endSession();
SessionController::checkSession();
require_once("../connection.php");
$albumList = AlbumDB::listar($conexao);
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
?>

<div class="container" style="margin-top:20px;">
<h1>Listagem de Album</h1>
	<ul class="breadcrumb">
    	<li class="active">Listagem <span class="divider">/</span></li>
    	<li><a href="/loja_project/album/create.php">Novo</a></span></li>
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
          <th>Nome Album</th>
          <th>Ano</th>
          <th>Quantidade em Estoque</th>
          <th>Valor</th>
          <th>Grupo</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>

      <?php foreach ($albumList as $value) {
        echo "<tr>";
          echo "<td>" . $value->getIdAlbum()  ."</td>";
          echo "<td>" . $value->getNome()  ."</td>";
          echo "<td>" . $value->getAno()  ."</td>";
          echo "<td>" . $value->getQuantidadeEstoque()  ."</td>";
          echo "<td>" . $value->getValor()  ."</td>";
          echo "<td>" . GrupoDB::findNameById($value->getIdGrupo(), $conexao)  ."</td>";

          echo "<td class='col-md-2'>";
            echo "<a href='/loja_project/album/edit.php?id=".$value->getIdAlbum()."'> <button class='btn btn-default' type='button'>";
            echo "<span aria-hidden='true' class='glyphicon glyphicon-edit'></span>";
            echo "</button></a>";

              echo "<a href='/loja_project/album/delete.php?id=".$value->getIdAlbum()."'> <button class='btn btn-default' type='button'>";
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