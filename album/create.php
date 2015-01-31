<?php

include('../header.php');
include('../autenticacao/SessionController.php');
include('../grupo/GrupoDB.php');
require_once("../connection.php");
//SessionController::endSession();
SessionController::checkSession();
$message = null;
if(isset($_REQUEST["message"]) ){
    $message = $_REQUEST["message"];
}
$grupoList = GrupoDB::listar($conexao);
?>

<div class="container" style="margin-top:20px;">
<h1>Cadastro de Albuns</h1>
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
             <form autocomplete="off" id="login-form" method="post" action="/loja_project/album/salvar.php" role="form">
                   <div class="form-group">
                      <label for="Id">Identificador</label>
                      <input type="number" placeholder="Identificador"  class="form-control" id="id" name="id">
                  </div>
                  <div class="form-group">
                      <label for="nome">Nome</label>
                      <input placeholder="Nome do Album"  class="form-control" id="nome" name="nome">
                  </div>
                   <div class="form-group">
                      <label for="ano">Ano</label>
                      <input type="number" placeholder="Ano"  class="form-control" id="ano" name="ano">
                  </div>
                   <div class="form-group">
                      <label for="quantidade_estoque">Quantidade em estoque</label>
                      <input type="number" placeholder="Quantidade em estoque"  class="form-control" id="quantidade_estoque" name="quantidadeEstoque">
                  </div>
                  <div class="form-group">
                      <label for="valor">Valor</label>
                      <input type="float" placeholder="Valor do produto" class="form-control" id="valor" name="valor">
                  </div>
            <!--       <div class="form-group">
                      <label for="capa">Capa</label>
                       <input type="file" name="capa" id="capa">
                  </div> -->
                 

                   <div class="form-group">
                      <label for="grupo">Grupo</label>
                     
                        <select name="idGrupo">
                          <?php foreach ($grupoList as $value) {
                            echo "<option value='" . $value->getIdGrupo() . "'>".$value->getNome()."</option>";
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