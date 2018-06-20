<?php

/* cadastra usuário e emite erros caso campus estejam vazios os incorretos */

require_once("ConnectionFactory.php");

$erro = false;

if ( ( ! isset( $_POST['email'] ) || ! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) && !$erro ) {
	$erro = 'Insira um email válido.';
}

if($_POST['senha']<>$_POST['csenha']){
	$erro = 'Senhas Diferentes.';
}

if ( $erro ) {
	echo "<script type='text/javascript'>alert('$erro');</script>";
	echo '<meta http-equiv="refresh" content="0;URL=cadastro.php" />';
	
} else {
	$sql = "INSERT INTO usuario(doacMedula,sexoUsuario,senhaUsuario,emailUsuario,telUsuario,dataNasc,fk_codSangue,nome) VALUES (
	'" . $_POST['medu'] . "',
	'" . $_POST['sexo'] . "',
	'" . sha1($_POST['senha'])  . "',
	'" . $_POST['email']  . "',
	'" . $_POST['cel']  . "',
	'" . $_POST['datan'] . "',
	'" . $_POST['tipos'] . "',
	'" . $_POST['nome'] . "'
	)";

	try {
		mysqli_query($conn,$sql);
	} catch (Exception $e) {
		mysqli_error($conn);
	}


	mysqli_close($conn);

	header("location: entra.php");
}



?>	