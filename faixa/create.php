<?php

include('../header.php');
include('../autenticacao/SessionController.php');
include('../album/AlbumDB.php');
require_once("../connection.php");
//SessionController::endSession();
SessionController::checkSession();
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
$albumList = AlbumDB::listar($conexao);
?>

<div class="container" style="margin-top:20px;">
<h1>Cadastro de faixa</h1>
	<ul class="breadcrumb">
    	<li> <a href="/loja_project/faixa/list.php" >Listagem </a><span class="divider">/</span></li>
    	<li class="active">Novo</a></span></li>
    </ul>
   <div class="row">
          <div class="col-xs-12">
             <?php 
                if($message){
                  echo "<div class='alert alert-danger' role='alert'>".$message . "</div>";
                }
             ?>
             <form autocomplete="off" id="login-form" method="post" action="/loja_project/faixa/salvar.php" role="form">
                   <div class="form-group">
                      <label for="Id">Identificador</label>
                      <input type="number" placeholder="Identificador"  class="form-control" id="id" name="id">
                  </div>
                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <input placeholder="Nome da Faixa"  class="form-control" id="nome" name="nome">
                  </div>
                  <div class="form-group">
                      <label for="duracao">Duração</label>
                      <input type="number" placeholder="Segundos de duração"  class="form-control" id="duracao" name="duracao">
                  </div>
                    <div class="form-group">
                      <label for="grupo">Album</label>
                     
                        <select name="idAlbum">
                          <?php foreach ($albumList as $value) {
                            echo "<option value='" . $value->getIdAlbum() . "'>".$value->getNome()."</option>";
                          }
                          ?>
                        </select>
                  </div>
                  <input type="submit" value="Salvar" class="btn btn-custom btn-lg btn-block" id="btn-login">
              </form>
          </div>
    </div>
  </div>


<?php


include('../footer.php');

?>