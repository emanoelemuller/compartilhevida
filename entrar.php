<?php

/* Confere no BD se o usuário existe e entra para página usuário */

require_once("ConnectionFactory.php");

try {
	$sql = mysqli_query($conn,"SELECT * FROM usuario where (
		emailUsuario = '" . $_POST['email'] . "' 
			and 
		senhaUsuario = '" . sha1($_POST['senha']) . "')") 
	or die(mysqli_error($conn));	
	$result = mysqli_fetch_assoc($sql);
	$row = mysqli_num_rows($sql);


	if ($row > 0) {
		session_start();
		$_SESSION['emailUsuario'] = $result['emailUsuario'];
		$_SESSION['senhaUsuario'] = $result['senhaUsuario'];
		$_SESSION['codUsuario'] = $result['codUsuario'];
		$_SESSION['fk_codSangue'] = $result['fk_codSangue'];		
		header('location: user.php');
	} else {
		header('location: fail.php') . mysqli_error($conn);
	}
} catch (Exception $e) {
	mysqli_error($conn);
} 


mysqli_close($conn);

?>