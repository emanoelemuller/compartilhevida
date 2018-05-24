<?php

// definir padrao uft-8 no html e o horario nacional 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("America/Sao_Paulo");

//	definicao do banco de dados
//	nome do usuario e senha
//	gerar a conexao com o servidor do banco
//	e selecionando o banco desejado
define('DATABASE','db_compartilhevida');
define('SERVERNAME','localhost');
define('USERNAME','root');
define('PASSWORD','usbw');

$conn = mysqli_connect(
	SERVERNAME,
	USERNAME,
	PASSWORD
) or die(
	mysqli_error($conn)
);
mysqli_select_db(
	$conn,
	DATABASE
) or die(
	mysqli_error($conn)
);

// buscando e salvando os dados 
// sempre com o padrao utf8 no banco de dados
mysqli_query(
	$conn,
	"SET NAMES 'utf8'"
);
mysqli_query(
	$conn,
	"SET character_set_connection=utf8"
);
mysqli_query(
	$conn,
	"SET character_set_client=utf8"
);
mysqli_query(
	$conn,
	"SET character_set_results=utf8"
);

?>