<?php require_once("../ConnectionFactory.php"); ?>

<!doctype html>
<html>
  <head>

  	<title>Compartilhe Vida V3</title>

    <meta charset="UTF-8">

  	<link rel="icon" href="imagens/gotinha.png" type="image/x-icon" /> <!-- icon -->
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link type="text/css" href="style.css" rel="stylesheet" /> <!-- importa css -->
  	<link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Ubuntu" rel="stylesheet"> <!-- importa fontes -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- importa bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> <!-- importa jquerry -->

  </head>

  <body>

    <!-- navbar -->
    	<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar  -->
    	  <div class="container-fluid">

    			<div class="navbar-header">
    			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			  </button>
    			</div>

    			<div class="collapse navbar-collapse" id="myNavbar">
    			  <ul class="nav navbar-nav">
    				<li><a href="#">Início</a></li>
    				<li><a href="cadastro.html">Cadastrar</a></li>
    				<li><a href="entra.html">Entrar</a></li>
    			  </ul>
    			</div>

    		</div>
    	</nav>
    <!-- fim navbar -->

    <!-- corpo -->
      <div class="container-fluid">

    		<!-- header -->
    		<div class="row header">
    		  <div class="col-12">
    			  <center><img src="imagens/logctexto.png" class="img-responsive"></center>
    		  </div>
    		</div> <!-- fim header -->

    		<!-- info -->
    		<div class="row info" id="info">
    		  <div class="col-sm-4 caixa" id="caixa">
      			<center><img src="imagens/balaoagota.png" class="img-responsive"> </center><br>
      			<p>Estar com a saúde em perfeitas condições é o ponto chave para compartilhar vida. Entenda os requisitos necessários para se tornar um doador. </p>
      			<center><a href="#doacao"><button id="btnDoacao" class="banner-button banner-button-animation"><span>SOBRE DOAÇÃO</span></button></a></center>
    		  </div>

    		  <div class="col-sm-4 caixa" id="caixa2">
      			<center><img src="imagens/balaoac.png" class="img-responsive"> </center><br>
      			<p>Nossa plataforma online é fruto de um trabalho de conclusão de curso técnico. Acompanhe nossa trajetória e entenda como ela funciona.</p>
      			<center><a href="#plat"><button id="btnPlat" class="banner-button banner-button-animation"><span>SOBRE PLATAFORMA</span></button></a></center>
    		  </div>

      		<div class="col-sm-4 caixa" id="caixa3">
      			<center><img src="imagens/balaoduv.png" class="img-responsive"> </center><br>
      			<p>Participe. Torne-se um doador cadastrando-se na plataforma e ajude a compartilhar vida.
</p>
      			<center><a href="#"><button class="banner-button banner-button-animation"><span>CADASTRE-SE</span></button></a></center>
    		  </div>
    		</div> <!-- fim info -->

			<!-- doação -->
    		<div class="row maisd" id="doacao">
    			<hr align="center" width="80%" size="10px" color="#6769c9">

    			<div class="col-sm-6">
    			  <center><h1>Requisitos básicos</h1></center>
    			  <ul>
    				<li>Ter entre 16 e 69 anos, desde que a primeira doação tenha sido feita até 60 anos </li>
    				<li>Pesar no mínimo 50kg</li>
    				<li>Ter dormido pelo menos 6 horas nas últimas 24 horas</li>
    				<li>Apresentar documento original com foto recente, que permita a identificação do candidato</li>
    				<li>Estar em boas condições de saúde</li>
    			  </ul>
    			  <center><h1>Intervalo de doações</h1></center>
    			  <ul>
    				<li>Homens - 60 dias (máximo de 04 doações nos últimos 12 meses).</li>
    				<li>Mulheres - 90 dias (máximo de 03 doações nos últimos 12 meses).</li>
    			  </ul>
    			</div>

    			<div class="col-sm-6">
    				<center><h1> Impedimentos temporários</h1></center>
    				  <ul>
    					<li>Resfriado: aguardar 7 dias após desaparecimento dos sintomas.</li>
    					<li>Gravidez</li>
    					<li>90 dias após parto normal e 180 dias após cesariana.</li>
    					<li>Amamentação (se o parto ocorreu há menos de 12 meses).</li>
    					<li>Ingestão de bebida alcoólica nas 12 horas que antecedem a doação.</li>
    					<li>Tatuagem / maquiagem definitiva nos últimos 12 meses.</li>
    					<li>Situações nas quais há maior risco de adquirir doenças sexualmente transmissíveis: aguardar 12 meses.</li>
    					<li>Qualquer procedimento endoscópico (endoscopia digestiva alta, colonoscopia, rinoscopia etc): aguardar 6 meses.</li>
    					<li>Extração dentária (verificar uso de medicação) ou tratamento de canal (verificar medicação): por 7 dias.</li>
    					<li>Cirurgia odontológica com anestesia geral: por 4 semanas.</li>
    					<li>Vacina contra gripe: por 48 horas.</li>
    					<li>Herpes labial ou genital: apto após desaparecimento total das lesões.</li>
    					<li>Herpes Zoster: apto após 6 meses da cura (vírus Varicella Zoster).</li>
    				  </ul>
					  
    			</div>
					
    			<div class="col-sm-12">
      			<h1 class="az">Onde doar</h1>
      			<center><script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">https://embedgooglemaps.com/pt/</a></small></div><div><small><a href="http://notariskosten.nu/hoeverre-verschillen-notariskosten-hoogte/">Go here</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:6,center:new google.maps.LatLng(-19.1834229,-40.3088626),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-19.1834229,-40.3088626)});infowindow = new google.maps.InfoWindow({content:'<strong>Teste</strong><br>Esp�rito Santo, Brasil<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script></center>
				<center><button class="banner-button banner-button-animation"><span><a href="entra.html">QUERO AJUDAR</a></span></button></center>
				<center><a href="#info"><button id="btnFecha" class="banner-button banner-button-animation"><span>VOLTAR</span></button></a></center> 
    		  </div>
			  
			  

    		</div> <!-- fim doação -->

    		<div class="row maisp" id="plat">
    			<hr align="center" width="80%" size="10px" color="#6769c9">
    			<div class="col-sm-12">
    				<h1>Plataforma</h1>
    				<p>O projeto “Compartilhe Vida”, desenvolvido pelos estudantes do curso técnico de Informática no Instituto Federal do Espírito Santo (IFES), consiste em um site desenvolvido com o intuito de dinamizar o processo da doação no que tange o processo de conhecimento sobre a doação (que é vago e descentralizado na maioria das vezes, contendo muitos mitos) e a organização, evitando também as correntes nas redes sociais como Facebook, WhatsApp, Twitter, entre outras. Para isso, desenvolvemos uma plataforma que centraliza essas informações e ainda disponibiliza um feed de pedidos de doações integrado entre os usuários (tendo como filtro automático o seu tipo sanguíneo) a fim de favorecer a procura e também a resposta de doadores.
    				</p>
					<center><a href="#info"><button id="btnFecha2" class="banner-button banner-button-animation"><span>VOLTAR</span></button></a></center>
    			</div>
    		</div>

    		<!-- rodapé  -->
    	  <div class="row">
      		<div class="col-sm-12 rodape text-center">
      			<img src="imagens/maozinea.png" class="img-responsive">
      			<h1>Compartilhe vida</h1><br>
      			<p>Alguma nota de rodapé que não faço ideia de como escrever</p><br>
      			<p>Compartilhe Vida © 2017 | Diretos Reservados</p>
      		</div>
    	  </div>
    	  <!-- fim rodapé  -->

      </div> <!-- fim corpo -->


    <script type="text/javascript" src="main.js"></script> <!-- importa js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </body>
</html>

<?php mysqli_close($conn); ?>