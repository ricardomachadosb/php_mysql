<?php

include('header.php');

?>

<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
               	 <h1>Autentique para ter acesso ao sistema</h1>
                    <?php if($_REQUEST["erro"]){
                            echo "<p style='color:red'>Erro na autenticação</p>";
                        }?>
                    <form autocomplete="off" id="login-form" method="post" action="autenticacao/logar.php" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input placeholder="Login"  class="form-control" id="email" name="login">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="key">Password</label>
                            <input type="password" placeholder="Senha" class="form-control" id="key" name="password">
                        </div>
                        <div class="checkbox">
                            <span onclick="showPassword()" class="character-checkbox"></span>
                            <span class="label">Mostrar senha</span>
                        </div>
                        <input type="submit" value="Log in" class="btn btn-custom btn-lg btn-block" id="btn-login">
                    </form>
                    <a data-target=".forget-modal" data-toggle="modal" class="forget" href="javascript:;">Esqueceu sua senha?</a>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<?php


include('footer.php');

?>