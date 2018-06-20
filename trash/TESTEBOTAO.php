<?php 

	$codigo = "codigo";
	$var = "/?searchterm=codigo&search=Feia";
	$var2 = "obrigada.php$var";
	echo $var2;

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>TESTE</h1>

	<!-- <form method="get">
		<p>
			<label for="searchterm">Find Flowers</label>
			<input type="search" name="searchterm" id="searchterm">
			<input type="submit" name="search" id="searchterm" value = "Feia">
		</p>
	</form> -->
	<?php (isset($_GET['searchterm'])) ?>
		<p>
			<a href=<?php echo $var2; ?>><button id="btnAtP" class="feedBotao"  align="center"><span>AJUDAR</span></button></a>
		</p>
	<?php ?>
</body>
</html>