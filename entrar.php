<?php


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
		header('location: user.html');
	} else {
		echo "
			Usuario invalido... 
			<a href='entra.php'>Tente novamente</a>
		<br>" . mysqli_error($conn);
	}
} catch (Exception $e) {
	mysqli_error($conn);
} 


mysqli_close($conn);

?>