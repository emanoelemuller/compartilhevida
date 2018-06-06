<?php 
	session_start(); 

	require_once("ConnectionFactory.php"); 

$sql = ("SELECT * FROM usuario WHERE (codUsuario='".$_SESSION['codUsuario']."')");
    $result = mysqli_query($conn, $sql);
    $res = $result->fetch_assoc();


?>

<!doctype html>
<html>

<head>
	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- habilita mobile -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="cssjs/style.css" rel="stylesheet" /> <!-- importa css -->
  	<link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Ubuntu" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet"> <!-- importa fontes -->

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
    				<li><a href="#">Cadastrar</a></li>
    				<li><a href="entra.php">Entrar</a></li>
    			  </ul>
    			</div>

    		</div>
    	</nav>
    <!-- fim navbar -->

	<div class="container-fluid">
	  <div class="row branquinho">
		 <h2>ALTERAR CADASTRO</h2>
		  <form method="post" action="altcadastrar.php">
		  
			<div class="form-group entrada">
			  <label for="nome">Nome:</label>
				<input type="text" class="form-control" id="nome" placeholder="Fulano de Tal" name="nome" value="<?php echo $res['nome'] ?>" required>

				<div>
					<label for="datan">Data de Nascimento:</label>
					<input class="form-control input-sm" id="datan" type="date" name="datan" value="<?php echo $res['dataNasc'] ?>"required>
				</div>

				<label for="cel">Celular:</label>
				<input type="text" class="form-control" id="cel" placeholder="(27) 99999-9999" name="cel"value="<?php echo $res['telUsuario'] ?>">

				<label for="email">E-mail:</label>
				<input type="text" class="form-control" id="email" placeholder="fulanodetal@email.com.br" name="email" value="<?php echo $res['emailUsuario'] ?>"required>

				<label for="senha">Senha antiga:</label>
				<input type="password" class="form-control" id="senha" placeholder="senha" name="senha" required>
				<label for="csenha">Nova senha:</label>
				<input type="password" class="form-control" id="csenha" placeholder="Ou repita senha" name="csenha" required>

				<input type="hidden" name="asenha" value="<?php echo $res['senhaUsuario']; ?>">

				<center><a href="#"><button id="btnFecha" class="banner-button banner-button-animation" type="submit"><span>ALTERAR DADOS</span></button></a></center>

				
			</div>
		
	  </div>
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
	</div>
   <!-- fim container  -->


</body>

</html>
<?php mysqli_close($conn); ?>