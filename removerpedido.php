<?php

/* muda status do pedido pra inativo*/

session_start();

require_once("ConnectionFactory.php");


$sql = "UPDATE pedido SET ativo='2' WHERE codDoacao = '".$_GET['codDoacao']."'";

try {
	mysqli_query($conn,$sql);
} catch (Exception $e) {
	mysqli_error($conn);
}


mysqli_close($conn);

header("location: meuspedidos.php");




?>	