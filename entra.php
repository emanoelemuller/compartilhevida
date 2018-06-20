<?php require_once("ConnectionFactory.php"); ?>


<!doctype html>
<html>

<head>

  	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- habilita mobile -->
    <link type="text/css" href="cssjs/style.css" rel="stylesheet" /> <!-- importa css -->
  	<link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet"><!-- importa fontes -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- importa bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> <!-- importa jquerry -->

  </head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar  -->
    	  <div class="container-fluid">

    			<div class="navbar-header">
    			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			  </button>
    			</div>

    			<div class="collapse navbar-collapse" id="myNavbar">
    			  <ul class="nav navbar-nav">
    				<li><a href="index.php">Início</a></li>
    				<li><a href="cadastro.php">Cadastrar</a></li>
    				<li><a href="#">Entrar</a></li>
    			  </ul>
    			</div>

    		</div>
    	</nav>
    <!-- fim navbar -->

	<div class="container-fluid text-center">
	  <div class="row bg branquinho2">
	    <form method="post" action="entrar.php">
  		  <div class="form-group">
  			<label for="email">E-mail:</label>
  			<input type="text" class="form-control" placeholder="fulanodetal@email.com.br" name="email">
  		  </div>
  		  <div class="form-group">
  			<label for="senha">Senha:</label>
  			<input type="password" class="form-control" placeholder="*******" name="senha">
  		  </div>
  		  <a href=""><button id="btnDoacao" class="banner-button banner-button-animation" type="submit"><span>ENTRA</span></button></a>
  		  
      </form>
        <!-- <a href="cadastro.php"><button id="btnDoacao" class="banner-button banner-button-animation"><span>CADASTRAR</span></button></a><br>
		
		  <a href="#">Esqueci a senha</a> -->
      <a href="cadastro.php">Não possui uma conta? Cadastre-se!</a>
	  </div>


        <!-- rodapé  -->
        <div class="row">
          <div class="col-sm-12 rodape text-center">
            <img src="imagens/maozinea.png" class="img-responsive">
            <h1>Compartilhe vida</h1><br>
            <p>Compartilhe Vida © 2017-2018 | Diretos Reservados</p>
          </div>
        </div>
        <!-- fim rodapé  -->
	</div>
   <!-- fim container  -->


</body>

</html>
<?php mysqli_close($conn); ?>
