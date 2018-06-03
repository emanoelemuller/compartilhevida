<?php

//Verifica e atribui a página
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Quantidade (limite) de dados por página; numéro arbitrário (por enquanto)
$limite = 2;

//Calcula início da vizualização
$inicio = ($limite * $pagina) - $limite;


//Output (deve estar no HTML)
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
				echo "<b>Causa Pedido:</b> " . $row['causaPedido'] . "<br>";
				echo "<b>CodUsuário:</b> " . $row['fk_codUsuario'] . "<br>";
				echo "<b>CodSangue:</b> " . $row['fk_CodSangue'] . "<br><hr>";
		}
} else {
		echo "0 results";
}

//Paginação

//Contador de dados na tabela
$resultpg = "SELECT COUNT(codDoacao) AS numPg FROM pedido";
$resultPg = mysqli_query($conn, $resultpg);
$cont = mysqli_fetch_assoc($resultPg);

//Calcula do total de páginas
$qtdtotal = ceil($cont['numPg'] / $limite);

//Ir para a primeira página (botão)
if($pagina != 1){
	echo "<a href='feed.php?pagina=1'>Primeira </a>";
}

//Página anterior (botão)
$anterior = $pagina - 1;
if($anterior >= 1){
	echo "<a href='feed.php?pagina=$anterior'>Anterior </a>";
}

//Página atual (apenas mostrar)
echo "$pagina ";

//Página posterior (botão)
$proxima = $pagina + 1;
if($proxima <= $qtdtotal){
	echo "<a href='feed.php?pagina=$proxima'>Próxima </a>";
}

//Última página (botão)
if($pagina != $qtdtotal){
	echo "<a href='feed.php?pagina=$qtdtotal'>Última </a>";
}

?>
