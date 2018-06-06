<?php

/* Adiciona a tabela >atendecria< atendendo um pedido */

session_start(); 

require_once("ConnectionFactory.php");

$sql = "INSERT INTO atendecria(tipo,fk_codUsuario,fk_codDoacao) VALUES (
	'2',
	'" . $_SESSION['codUsuario'] . "',
	'" . $_POST['codDoa'] . "'	
)";

try {
	mysqli_query($conn,$sql);
} catch (Exception $e) {
	mysqli_error($conn);
}

mysqli_close($conn);

header("location: feed.php");

?>	