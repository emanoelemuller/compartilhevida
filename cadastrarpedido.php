<?php

session_start(); 

require_once("ConnectionFactory.php");

$sql = "INSERT INTO pedido(comentario,qntDoacao,dataPedido,nomePaciente,causaPedido,fk_codUsuario,fk_codSangue) VALUES (
	'" . $_POST['comen'] . "',
	'" . $_POST['qntdoa'] . "',
	CURDATE() ,
	'" . $_POST['nome']  . "',
	'" . $_POST['causa'] . "',
	'" . $_SESSION['codUsuario'] . "',
	'" . $_POST['tipos'] . "'
	
)";

if(mysqli_query($conn,$sql)){
		$last_id = mysqli_insert_id($conn);
	}

$sql = "INSERT INTO atendecria(tipo,fk_codUsuario,fk_codDoacao) VALUES (
	'1',
	'" . $_SESSION['codUsuario'] . "',
	'.$last_id.'	
)";

try {
	mysqli_query($conn,$sql);
} catch (Exception $e) {
	mysqli_error($conn);
}

mysqli_close($conn);

header("location: feed.php");

?>	