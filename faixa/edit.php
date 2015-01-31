<?php

include('../header.php');
include('../autenticacao/SessionController.php');
require_once("../connection.php");
require_once("FaixaDB.php");
require_once("../album/AlbumDB.php");
//SessionController::endSession();
SessionController::checkSession();
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
$albumList = AlbumDB::listar($conexao);
$id = $_REQUEST["id"];
$faixa = FaixaDB::findById($id, $conexao);
?>

<div class="container" style="margin-top:20px;">
<h1>Edição de faixa</h1>
	<ul class="breadcrumb">
    	<li> <a href="/loja_project/faixa/list.php" >Listagem </a><span class="divider">/</span></li>
    	<li> <a href="/loja_project/faixa/create.php" >Novo </a><span class="divider">/</span></li>
      <li class="active">Edição</a></span></li>
    </ul>
   <div class="row">
          <div class="col-xs-12">
             <?php 
                if($message){
                  echo "<div class='alert alert-danger' role='alert'>".$message . "</div>";
                }
             ?>
             <form autocomplete="off" id="login-form" method="post" action="/loja_project/faixa/update.php" role="form">
                   <div class="form-group">
                      <label for="Id">Identificador</label>
                      <?php
                        echo "<input type='number' placeholder='Identificador'  class='form-control' id='id' name='id' value='". $faixa->getIdFaixa() ."'>"
                      ?>
                  </div>
                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <?php 
                        echo "<input placeholder='Nome da Faixa'  class='form-control' id='nome' name='nome' value='". $faixa->getNome() ."'>"
                      ?>
                  </div>
                  <div class="form-group">
                      <label for="duracao">Duração</label>
                      <?php 
                        echo " <input type='number' placeholder='Segundos de duração'  class='form-control' id='duracao' name='duracao' value='". $faixa->getDuracao() ."'>"
                      ?>
                  </div>

                   <div class="form-group">
                      <label for="album">Album</label>
                     
                        <select name="idAlbum">
                          <?php foreach ($albumList as $value) {
                            if($value->getIdAlbum() == $faixa->getIdAlbum()){
                              echo "<option value='" . $value->getIdAlbum() . "' selected>".$value->getNome()."</option>";
                            }else{
                              echo "<option value='" . $value->getIdAlbum() . "'>".$value->getNome()."</option>";
                            }
                          }
                          ?>
                        </select>
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