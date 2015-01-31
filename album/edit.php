<?php

include('../header.php');
include('../autenticacao/SessionController.php');
include('AlbumDB.php');
include('../grupo/GrupoDB.php');
require_once("../connection.php");
//SessionController::endSession();
SessionController::checkSession();
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
$grupoList = GrupoDB::listar($conexao);
$id = $_REQUEST["id"];
  $album = AlbumDB::findById($id, $conexao);
?>

<div class="container" style="margin-top:20px;">
<h1>Edição de Album</h1>
	<ul class="breadcrumb">
    	<li> <a href="/loja_project/album/list.php" >Listagem </a><span class="divider">/</span></li>
    	<li class="active">Novo</a></span></li>
    </ul>
   <div class="row">
          <div class="col-xs-12">
             <?php 
                if($message){
                  echo "<div class='alert alert-danger' role='alert'>".$message . "</div>";
                }
             ?>
             <form autocomplete="off" id="login-form" method="post" action="/loja_project/album/update.php" role="form">
                   <div class="form-group">
                      <label for="Id">Identificador</label>
                      <?php
                        echo "<input type='number' placeholder='Identificador'  class='form-control' id='id' name='id'  value='" . $album->getIdAlbum() . "'>";
                      ?>
                  </div>
                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <?php
                        echo "<input placeholder='Nome do Album'  class='form-control' id='nome' name='nome' value='" . $album->getNome() . "''>";
                      ?>

                  </div>
                   <div class="form-group">
                      <label for="ano">Ano</label>
                      <?php
                        echo "<input type='number' placeholder='Ano'  class='form-control' id='ano' name='ano' value='". $album->getAno() ."' >";
                      ?>
                  </div>
                   <div class="form-group">
                      <label for="quantidade_estoque">Quantidade em estoque</label>
                      <?php
                        echo "<input type='number' placeholder='Quantidade em estoque'  class='form-control' id='quantidade_estoque' name='quantidadeEstoque' value='" . $album->getQuantidadeEstoque() . "'>";
                      ?>
                  </div>
                  <div class="form-group">
                      <label for="valor">Valor</label>
                       <?php
                        echo "<input type='float' placeholder='Valor do produto' class='form-control' id='valor' name='valor' value='". $album->getValor() . "'>";
                      ?>
                      
                  </div>

                   <div class="form-group">
                      <label for="grupo">Grupo</label>
                     
                        <select name="idGrupo">
                          <?php foreach ($grupoList as $value) {
                            if($value->getIdGrupo() == $album->getIdGrupo()){
                              echo "<option value='" . $value->getIdGrupo() . "' selected>".$value->getNome()."</option>";
                            }else{
                              echo "<option value='" . $value->getIdGrupo() . "'>".$value->getNome()."</option>";
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