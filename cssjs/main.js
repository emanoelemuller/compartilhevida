$("#caixa").hide();
$("#caixa2").hide();
$("#caixa3").hide();
$("#doacao").hide();
$("#plat").hide();
	for(i=0;i<3;i++){
	  if(i==0){
		$( document ).ready(function() {
		  setTimeout(carregar, 0);
		});
		function carregar() {
			$("#caixa").fadeIn(1000);
		}
	  }else{
			if(i==1){
			 $( document ).ready(function() {
				setTimeout(carregar, 800);
			 });
			  function carregar() {
				$("#caixa2").fadeIn(1000);
			  }
			} else{
			  $( document ).ready(function() {
				setTimeout(carregar, 1600);
			  });
			  function carregar() {
				$("#caixa3").fadeIn(1000);
			  }
			}
		}
	}
	$("#btnDoacao").click(function(){      
		$("#plat").hide();	
		$('.navbar').css("background-color", "#6769c9")				
		$("#doacao").fadeIn(1000);	
	});
	$("#btnPlat").click(function(){  
		$("#doacao").hide();
		$('.navbar').css("background-color", "#b6528c")
		$("#plat").fadeIn(1000);
	});
	$("#btnFecha").click(function(){  
		$("#doacao").hide();
		$('.navbar').css("background-color", "#DF0005")
	});
	$("#btnFecha2").click(function(){  
		$("#plat").hide();
		$('.navbar').css("background-color", "#DF0005")
	});