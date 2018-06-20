<?php 
session_start(); 
require_once("ConnectionFactory.php"); 

$sql = "SELECT * FROM hemocentro";
$result = mysqli_query($conn, $sql);

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
	    				<li><a href="user.php">Perfil</a></li>
	    				<li><a href="feed.php">Feed</a></li>
	    				<li><a href="meuspedidos.php">Meus Pedidos</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
      					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
    				</ul>
    			</div>

    		</div>
    	</nav>
    <!-- fim navbar -->

	<div class="container-fluid">
	  <div class="row branquinho">
		 <h2>CADASTRO DE PEDIDO</h2>
		  <form method="post" action="cadastrarpedido.php">
		  
			<div class="form-group entrada">
			  <label for="nome">Nome Paciente:</label>
				<input type="text" class="form-control" id="nome" placeholder="Fulano de Tal" name="nome" required>
				<div>
					<label for="causa">Causa:</label>
					<input type="text" class="form-control" id="causa" placeholder="Cirurgia" name="causa" required>
				</div>

				<label for="tsangue">Tipo Sanguíneo:</label>
					<select class="form-control" id="tsangue" name="tipos" required>
						<option value="1" name="tipos">A+</option>
						<option value="2" name="tipos">A-</option>
						<option value="3" name="tipos">B+</option>
						<option value="4" name="tipos">B-</option>
						<option value="5" name="tipos">AB+</option>
						<option value="6" name="tipos">AB-</option>
						<option value="7" name="tipos">O+</option>
						<option value="8" name="tipos">O-</option>
					</select>

				<label for="qntdoa">Quantidade de Sangue (L):</label>
				<input type="text" class="form-control" id="qntdoa" placeholder="Quantidade necessaria de doações" name="qntdoa" required>

				<label for="localdoa">Local de Doação:</label>
				<select class="form-control" id="tsangue" name="localdoa" required>
				<?php if ($result->num_rows > 0) :?>
					<?php while($row = $result->fetch_assoc()) :?>
						<option value='<?php echo $row['nomeHemo']; ?>' name="localdoa"><?php echo $row['nomeHemo']; ?></option>
					
					<?php endwhile ?>
				<?php endif ?>
				</select>

				<label for="comen">Comentário:</label>
				<input type="text" class="form-control" id="comen" placeholder="Comentários" name="comen">

				<!--<textarea class="form-control" rows="5" id="comen" name="comen"></textarea>-->

				<center><a href="#"><button id="btnFecha" class="banner-button banner-button-animation" type="submit"><span>CRIAR PEDIDO</span></button></a></center>
		</form>
				
			</div>
		
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