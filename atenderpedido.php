<?php

/* Adiciona a tabela >atendecria< atendendo um pedido */

session_start(); 

require_once("ConnectionFactory.php");

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

mysqli_close($conn);

header("location: obrigada.php");

?>	