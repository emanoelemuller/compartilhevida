<?php

	require_once("ConnectionFactory.php");

	//Tipo sagnuíneo do usuário
	//???

	//Verifica e atribui a página
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

	//Quantidade (limite) de dados por página; numéro arbitrário (por enquanto)
	$limite = 2;

	//Calcula início da vizualização
	$inicio = ($limite * $pagina) - $limite;

	//Seleciona dados da tabela
	$sql = "SELECT * FROM pedido LIMIT $inicio, $limite";
	$result = mysqli_query($conn, $sql);

	//Filtra os dados por meio do TIPO SANGUÍNEO do USUÁRIO
	//???

	//Contador de dados na tabela
	$resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido";
	$resultPg = mysqli_query($conn, $resultpg);
	$cont = mysqli_fetch_assoc($resultPg);

	//Calcula do total de páginas
	$qtdtotal = ceil($cont['numPg'] / $limite);

	$anterior = $pagina - 1; //atribui valor da página anterior
	$proxima = $pagina + 1; //atribui valor da página posterio

?>

<!doctype html>
<html>

<head>
	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- habilita mobile -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="cssjs/LUCAS.css" rel="stylesheet" /> <!-- importa css -->
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
    				<li><a href="cadastro.php">Cadastrar</a></li>
    				<li><a href="entra.php">Entrar</a></li>
    			  </ul>
    			</div>

    		</div>
    	</nav>
    <!-- fim navbar -->

	<div class="container-fluid">
	  <div class="row branquinho">
		 <h1>Meu Feed</h1>


		 <!--TESTEFEED-->

			<div id="feedSubtitulo" class="entrada">
			  Mostrando pedidos pendentes compatíveis com o <b style="color:#ff2c32">seu</b> tipo sanguíneo
			</div>

			<br><br>

			<?php if ($result->num_rows > 0) :?>
				<?php while($row = $result->fetch_assoc()) :?>
					<div class="row feedBorda">
						<div class="col-sm-12 feed">
							<img src="imagens/Hands/RED_Hand.png" class="img-responsive handFeed">
									<h1><?php echo $row['nomePaciente'] ;?></h1>
									<p id="feedLetrinha">· Pedido realizado em <?php echo $row['dataPedido'] ;?> <span>· para [LOCALPEDIDO]</span> <span>· Precisa de <?php echo $row['qntDoacao'] ;?> Litros</span></p>
									<p><?php echo $row['comentario'] ;?></p>
									<?php $_SESSION['codDoacao'] = $row['codDoacao'] ;?>
									<a href="atenderpedido.php"><input class='feedBotao' type='button' value='Atender Pedido'></a>
						</div>
					</div>
				<?php endwhile ?>
			<?php endif ?>

			<?php if($anterior >= 1) :?>
				<a href="<?php echo "feed.php?pagina=$anterior" ?>"><input class='botaoSeta' type='button' value='<'></a>
			<?php endif ?>

			<?php if($proxima <= $qtdtotal) :?>
				<a href="<?php echo "feed.php?pagina=$proxima" ?>"><input class='botaoSeta' type='button' value='>'></a>
			<?php endif ?>

			<!-- <div id="feedSubtitulo" class="entrada">
			  Mostrando pedido pendentes compatíveis com o <b style="color:#ff2c32">seu</b> tipo sanguíneo
			</div>

			<br><br>

			<div class="row feedBorda">
				<div class="col-sm-12 feed">
					<img src="imagens/Hands/RED_Hand.png" class="img-responsive handFeed">
					<h1>[NOMEPACIENTE]</h1>
					<p id="feedLetrinha">· Pedido realizado em [DATAPEDIDO] <span>· para [LOCALPEDIDO]</span> <span>· Precisa de [QTDPEDIDO] Litros</span></p>
					<p>[COMENTÁRIO]</p>
					<a href="#"><input class='feedBotao' type='button' value='Atender Pedido'></a>
				</div>
			</div> -->

			<!--TESTEFEED-->

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
