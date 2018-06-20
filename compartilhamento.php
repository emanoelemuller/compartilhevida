<?php
  session_start(); 
  require_once("ConnectionFactory.php");

  //Tipo sagnuíneo do usuário
  $sangue = $_SESSION['fk_codSangue'];

  //Verifica e atribui a página
  $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

  //Quantidade (limite) de dados por página; numéro arbitrário (por enquanto)
  $limite = 2;

  //Calcula início da vizualização
  $inicio = ($limite * $pagina) - $limite;

  //Seleciona dados da tabela
  if($sangue=='1'){
    $sql = "SELECT * FROM pedido WHERE (fk_codSangue='1' or fk_codSangue='5') LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE (fk_codSangue='1' or fk_codSangue='5')";
  } elseif ($sangue=='2'){
    $sql = "SELECT * FROM pedido WHERE (fk_codSangue='1' or fk_codSangue='5' or fk_codSangue='2' or fk_codSangue='6')  LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE (fk_codSangue='1' or fk_codSangue='5' or fk_codSangue='2' or fk_codSangue='6')";
  } elseif ($sangue=='3'){
    $sql = "SELECT * FROM pedido WHERE (fk_codSangue='2' or fk_codSangue='5')  LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE (fk_codSangue='2' or fk_codSangue='5')";
  } elseif ($sangue=='4'){
    $sql = "SELECT * FROM pedido WHERE (fk_codSangue='3' or fk_codSangue='5' or fk_codSangue='2' or fk_codSangue='6')  LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE (fk_codSangue='3' or fk_codSangue='5' or fk_codSangue='2' or fk_codSangue='6')";
  } elseif ($sangue=='5'){
    $sql = "SELECT * FROM pedido WHERE fk_codSangue='5'  LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE fk_codSangue='5'";
  } elseif ($sangue=='6'){
    $sql = "SELECT * FROM pedido WHERE (fk_codSangue='5' or fk_codSangue=='6')  LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE (fk_codSangue='5' or fk_codSangue=='6')";
  } elseif ($sangue=='7'){
    $sql = "SELECT * FROM pedido WHERE (fk_codSangue='1' or fk_codSangue='5' or fk_codSangue='3' or fk_codSangue='7')  LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido WHERE (fk_codSangue='1' or fk_codSangue='5' or fk_codSangue='3' or fk_codSangue='7')";
  } else{
    $sql = "SELECT * FROM pedido LIMIT $inicio, $limite";
    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido";
    echo $sql;
  }

  $sql = "SELECT * FROM pedido "

  
  $result = mysqli_query($conn, $sql);

  //Seleciona dados da tabela
  // $sql = "SELECT * FROM pedido WHERE fk_codSangue=$sangue LIMIT $inicio, $limite";
  // $result = mysqli_query($conn, $sql);

  //Filtra os dados por meio do TIPO SANGUÍNEO do USUÁRIO
  //???

  //Contar
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
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="cssjs/LUCAS.css" rel="stylesheet"><!-- importa css -->
  	<link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Ubuntu" rel="stylesheet"> <!-- importa fontes -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- importa bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> <!-- importa jquerry -->

  </head>

  <body>
    <!-- corpo -->
      <div class="container-fluid text-center">
    <div class="row bg branquinho2"> 
      <br><br>
      <h1>Obrigada por ajudar!</h1>
      <?php if ($result->num_rows > 0) :?>
        <?php if($row = $result->fetch_assoc()) :?>
          <div class="row feedBorda">
            <div class="col-sm-12 feed">

              <p id="feedCod">#<?php $_SESSION['codDoa'] = $row['codDoacao']; echo $_SESSION['codDoa'] ;?></p>
              <img src="imagens/Hands/RED_Hand.png" class="img-responsive handFeed">
              <h1><?php echo $row['nomePaciente'] ;?></h1>
              <p id="feedLetrinha">· Pedido realizado em <b><?php echo $row['dataPedido'] ;?></b><span> · Precisa de <b><?php echo $row['qntDoacao'] ;?></b> Litros</span><span> · para <b><?php echo $row['localPedido'] ;?></b></span></p>
              <p><?php echo $row['comentario'] ;?></p>

              <button id="btnAtP" class="feedBotao"  align="center"><span>AJUDAR</span></button>


              <div id="aparece">
                 <form method="post" action="atenderpedido.php">

                  <input type="hidden" name="codDoa" value=<?php echo $row["codDoacao"]; ?>>
                  <p>Data que pretende efetivar o pedido:</p>
                  <input type="date" name="dataefe" required><br>
                  <button id="funciona" class="feedBotao" type="submit"><span>CONFIRMAR</span></button>

                </form>
              </div>

            </div>
          </div>
        <?php endif ?>
      <?php endif ?>
      <br><br><br><br><br><br>
    </div>
    		<!-- rodapé  -->
    	  <div class="row">
      		<div class="col-sm-12 rodape text-center ajrodape">
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