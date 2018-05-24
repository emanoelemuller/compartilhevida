<?php

/*
* receber os dados do formulario de cadastro
* salvar no banco
* redirecionar para pagina do usuario ou pagina principal...
*/

require_once("ConnectionFactory.php");

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

header("location: entra.html");

?>	