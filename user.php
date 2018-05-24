<?php require_once("ConnectionFactory.php"); ?>


<!doctype html>
<html>
  <head>

  	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="style.css" rel="stylesheet" /> <!-- importa css -->
  	<link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Ubuntu" rel="stylesheet"> <!-- importa fontes -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- importa bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> <!-- importa jquerry -->

  </head>

  <body>

    <!-- navbar -->
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
    				<li><a href="#">Início</a></li>
    				<li><a href="cadastro.html">Cadastrar</a></li>
    				<li><a href="entra.html">Entrar</a></li>
    			  </ul>
    			</div>

    		</div>
    	</nav>
    <!-- fim navbar -->

    <!-- corpo -->
      <div class="container-fluid">
		
    		<br><br><br><br><br>funciona<br><br><br><br><br>

    		<!-- rodapé  -->
    	  <div class="row">
      		<div class="col-sm-12 rodape text-center">
      			<img src="imagens/maozinea.png" class="img-responsive">
      			<h1>Compartilhe vida</h1><br>
      			<p>Alguma nota de rodapé que não faço ideia de como escrever</p><br>
      			<p>Compartilhe Vida © 2017 | Diretos Reservados</p>
      		</div>
    	  </div>
    	  <!-- fim rodapé  -->

      </div> <!-- fim corpo -->


    <script type="text/javascript" src="main.js"></script> <!-- importa js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </body>
</html>

<?php mysqli_close($conn); ?>