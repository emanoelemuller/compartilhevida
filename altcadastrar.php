<?php

session_start();

require_once("ConnectionFactory.php");

$erro = false;
// $erro é verdadeiro ou falso
// $error é a variavel que vai receber a mensagem do erro
// uma mesma variavel nao pode ter valores diferentes assim
// nao pro que voce faz ali no if($erro)

// e no $sql estava faltando o ponto e virgula, nao sei 

// testei e funcionou, mas qualquer coisa me avisa, beijo na bunda

if ( ( ! isset( $_POST['email'] ) || ! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) && !$erro ) {
	$error = 'Envie um email válido.';
}

if(sha1($_POST['senha'])<>$_POST['asenha']){
	$error = 'Senha antiga invalida.';
}

if ( $erro ) {
	echo "<script type='text/javascript'>alert('$error');</script>";
	echo '<meta http-equiv="refresh" content="0;URL=altcadastro.php" />';
	
} else {
	$sql = "UPDATE usuario SET senhaUsuario='" . sha1($_POST['senha'])  . "', nome='" . $_POST['nome'] . "',dataNasc='" . $_POST['datan'] . "',telUsuario='" . $_POST['cel'] . "',emailUsuario='" . $_POST['email'] . "' WHERE codUsuario = '".$_SESSION['codUsuario']."'";

	try {
		mysqli_query($conn,$sql);
	} catch (Exception $e) {
		mysqli_error($conn);
	}


	mysqli_close($conn);

	header("location: entra.php");
}



?>	