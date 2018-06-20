<?php 

session_start(); 
require_once("ConnectionFactory.php");

//Atende pedido
$r = 0;

while($r < 1){

    $sql = "INSERT INTO atendecria(tipo,fk_codUsuario,fk_codDoacao,data) VALUES (
      '2',
      '" . $_SESSION['codUsuario'] . "',
      '" . $_POST['codDoa'] . "',
      CURDATE()
      )";

    $sqlus = "UPDATE usuario SET ultimaDoacao='" . $_POST['dataefe'] . "' WHERE codUsuario = '".$_SESSION['codUsuario']."'";

    try {
      mysqli_query($conn,$sql);
      mysqli_query($conn,$sqlus);
    } catch (Exception $e) {
      mysqli_error($conn);
    }

  $r++;
}

//Código do pedido
$codigo = $_POST['codDoa'];

//Informações
$sql = "SELECT FROM pedido WHERE codDoacao=codigo";
$result = mysqli_query($conn, $sql);

?>


<!doctype html>
<html>
  <head>

  	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="cssjs/style.css" rel="stylesheet"><!-- importa css -->
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
      <a href="user.php">Seu perfil</a> 
      <br><br><br><br><br><br>
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

      </div> <!-- fim corpo -->


    <script type="text/javascript" src="main.js"></script> <!-- importa js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </body>
</html>

<?php mysqli_close($conn); ?>