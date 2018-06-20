
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TESTE</title>
  </head>
  <body>

    <h1>FEED</h1>
    <?php


    require_once("ConnectionFactory.php");

    // $sql = "SELECT nomePaciente, comentario, fk_codSangue FROM pedido";
    // $result = $conn->query($sql);
    //
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         echo "<br> Quem: ". $row["nomePaciente"]. " - Comentário: ". $row["comentario"]. " - TSangue: ". $row["fk_codSangue"]."<br>";
    //     }
    // } else {
    //     echo "0 results";
    // }

    //TESTEPAGINACAO


    // //Verifica e atribui a página
    // $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    //
    // //Select da tabela 'pedido'
    // $sql = "SELECT * FROM pedido";
    // $result = mysqli_query($conn, $result);
    //
    // //Contador de dados na tabela
    // $cont = mysqli_num_rows($result);
    //
    // //Quantidade de dados por página
    // $limite = 8;
    //
    // //Calcula do total de páginas
    // $qtdtotal = ceil($cont / $limite);
    //
    // //Calcula início da vizualização
    // $inicio = ($limite * $pagina)-$limite;
    //
    // //Quais dados são apresentados
    // $intel = "SELECT * FROM pedido LIMIT $inicio, $limite";
    // $result = mysqli_query($conn, $intel);
    // $cont = mysqli_num_rows($result);

    //Verifica e atribui a página
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

    //Quantidade de dados por página; numéro arbitrário
    $limite = 2;

    //Calcula início da vizualização
    $inicio = ($limite * $pagina)-$limite;


    $sql = "SELECT * FROM pedido LIMIT $inicio, $limite";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<b>CodDoação:</b> " . $row['codDoacao'] . "<br>";
            echo "<b>Comentário:</b> " . $row['comentario'] . "<br>";
            echo "<b>Quantidade Doação:</b> " . $row['qntDoacao'] . "<br>";
            echo "<b>Data Pedido:</b> " . $row['dataPedido'] . "<br>";
            echo "<b>Nome Paciente:</b> " . $row['nomePaciente'] . "<br>";
            echo "<b>CodUsuário:</b> " . $row['fk_codUsuario'] . "<br>";
            echo "<b>CodSangue:</b> " . $row['fk_CodSangue'] . "<br><hr>";
        }
    } else {
        echo "0 results";
    }

    //Contador de dados na tabela
    $resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido";
    $resultPg = mysqli_query($conn, $resultpg);
    $cont = mysqli_fetch_assoc($resultPg);

    //Calcula do total de páginas
    $qtdtotal = ceil($cont['numPg'] / $limite);

    //Ir para a primeira página
    if($pagina != 1){
      echo "<a href='paginacao.php?pagina=1'>Primeira </a>";
    }

    //Página anterior
    $anterior = $pagina - 1;
    if($anterior >= 1){
      echo "<a href='paginacao.php?pagina=$anterior'>Anterior </a>";
    }

    //Página atual
    echo "$pagina ";

    //Página posterior
    $proxima = $pagina + 1;
    if($proxima <= $qtdtotal){
      echo "<a href='paginacao.php?pagina=$proxima'>Próxima </a>";
    }

    //Última página
    if($pagina != $qtdtotal){
      echo "<a href='paginacao.php?pagina=$qtdtotal'>Última </a>";
    }


     ?>


  </body>
</html>
