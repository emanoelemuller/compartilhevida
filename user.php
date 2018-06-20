<?php
	
	session_start(); 

	require_once("ConnectionFactory.php");

	$sql = ("SELECT * FROM usuario WHERE (codUsuario='".$_SESSION['codUsuario']."')");
    $result = mysqli_query($conn, $sql);
    $res = $result->fetch_assoc();

    $sql1 = ("SELECT * FROM tipoSanguineo WHERE (codSangue='".$_SESSION['fk_codSangue']."')");
    $result = mysqli_query($conn, $sql1);
    $res1 = $result->fetch_assoc();


    //Pedidos realizados pelo usuário
    $codUsuario = $_SESSION['codUsuario']; 
	$sqlacha = ("SELECT * FROM atendecria WHERE (fk_codUsuario='".$codUsuario."' and tipo='2')");
	$resultacha = mysqli_query($conn, $sqlacha);
	// $res4 = $resultacha->fetch_assoc();



?>

<!doctype html>
<html>

<head>
	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- habilita mobile -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="cssjs/LIVIA.css" rel="stylesheet" /> <!-- importa css -->
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
	    				<li><a href="#">Perfil</a></li>
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

			<h1 class="">Meu Perfil</h1>
			<br>

			<div class="row">

				<div class="col-sm-3">
					<div class="circle" id="rosa">
		 				<?php echo $res1['tipoSangue']; echo $res1['rhSangue'];   ?>
		 		 	</div>
				</div>

				<div class="col-sm-9 infoPerfil">
					<ul class="">
						<li><b>Nome: </b><?php echo $res['nome']; ?></li>
						<li><b>E-mail: </b><?php echo $res['emailUsuario']; ?></li>
						<li><b>Telefone: </b><?php echo $res['telUsuario']; ?></li>

						<?php if ($res['ultimaDoacao']<>'0000-00-00')  :?>
							<li><b>Ultima doação: </b><?php echo $res['ultimaDoacao']; ?></li>
						<?php else :?>
							<li><b>Ultima doação: </b>Sem data disponivel</li>

						<?php endif ?>
						
					</ul>

					<!-- <form action=""> -->

					<a href="altcadastro.php"> <button id="perfilBotao" class="feedBotao" type=""><span>Editar dados</span></button></a>

				</div>

			</div>

			<br><br>

			<div class="row">

				<h1>Histórico de Doações</h1>

				<br>

				<table id="tabela">
					<tr>
						<th>Nome</th>
						<th>Local de Doação</th>
						<th>Data da Doação</th>
					</tr>
					<?php if ($resultacha->num_rows > 0) :?>
						<?php while($row = $resultacha->fetch_assoc()) :?>
							<?php //$sqlachou = (); 
							$resultachou = mysqli_query($conn, "SELECT * FROM pedido WHERE codDoacao = '". $row['fk_codDoacao']."' ");
							$res3 = $resultachou->fetch_assoc();
							?>
								<tr>
									<td style="border-left: 5px solid #b6528c;"><?php echo $res3['nomePaciente'] ?></td>
									<td><?php echo $res3['localPedido'] ?></td>
									<!-- <td><?php echo $res3['qntDoacao'] ?></td> -->
									<td><?php echo $row['data'] ?></td>
								</tr>
						<?php endwhile ?>
					<?php endif ?>
				</table>

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
