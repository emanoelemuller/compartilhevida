<?php
	session_start(); 

	require_once("ConnectionFactory.php");

	//Cod do usuário
	$useron = $_SESSION['codUsuario'];

	//Seleciona dados da tabela
	$sql = ("SELECT * FROM pedido WHERE fk_codUsuario=$useron");
	$result = mysqli_query($conn, $sql);

	//Contador de dados na tabela
	$nrow = mysqli_num_rows($result);


?>

<script type="text/javascript"> $('.navbar').css("background-color", "#6769c9")	</script>

<!doctype html>
<html>

<head>
	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- habilita mobile -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="cssjs/MANU.css" rel="stylesheet" /> <!-- importa css -->
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
	    				<li><a href="#">Meus Pedidos</a></li>
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
		 <h1>Meus Pedidos</h1> <br>

			<?php if ($nrow > 0) :?>
				<?php while($row = $result->fetch_assoc()) :?>
					<div class="row feedBorda">
						<div class="col-sm-12 feed">
						<?php $codDoa = $row['codDoacao']; $sqlacha = ("SELECT * FROM atendecria WHERE (fk_codDoacao='".$codDoa."' and tipo='2')");$resultacha = mysqli_query($conn, $sqlacha); $nrowacha = mysqli_num_rows($resultacha); ?>
							<img src="imagens/Hands/PURPLE_Hand.png" class="img-responsive handFeed">
									<h1><?php echo $row['nomePaciente'] ;?></h1>
									<p id="feedLetrinha">· Pedido realizado em <b><?php echo $row['dataPedido'] ;?></b><span> · Precisa de <b><?php echo $row['qntDoacao'] ;?></b> Litros</span><span> · para <b><?php echo $row['localPedido'] ;?></b></span></p>
									<p><?php echo $row['comentario'] ;?></p>
									<div id="feedSubtitulo" class="entrada">
									Um total de <b style="color:rgb(102,105,205);"><?php echo $nrowacha; ?><?php ?></b> pessoas atenderam seu pedido.
									</div>
									<form method="post" action="removerpedido.php">
										<input type="hidden" name="codDoa" value=<?php echo $row["codDoacao"]; ?>>
										<button id="funciona" class="feedBotao" type="submit"><span>ALTERAR STATUS</span></button>

									</form>
									
						</div>
					</div>
				<?php endwhile ?>
			<?php endif ?>

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
