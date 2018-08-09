<?php
session_start(); //start session
include("config.inc.php"); //include config file
?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"/>

<title>Portal de E-Commerce AtentaMente</title>

<link href="style/style.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


<!-- Plugin CSS -->
<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style/creative.min.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Agregando...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Agregar al carrito'); //reset button text to original text
				alert("Artículo añadido al carrito"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});

});
</script>
</head>

<body id="page-top">


<!-- Navigation -->
<!--
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger cart-box" id="cart-info" href="#"><?php 
if(isset($_SESSION["products"])){
   echo count($_SESSION["products"]); 
}else{
   echo 0; 
}
?></a>
<div class="shopping-cart-box">
<a href="#" class="close-shopping-cart-box" >Cerrar</a>
<h3>Tu carrito de compras</h3>
    <div id="shopping-cart-results">
    </div>
</div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 -->

<div class="header-row" id="header-row" style="padding: 0px; overflow:hidden; height:320px;">
        <!-- container-fluid is the same as container but spans a wider viewport, 
    it still has padding though so you need to remove this either by adding 
    another class with no padding or inline as I did below -->
   <div class="container-fluid" style="padding: 0px;">
      <div class="row"> 
        <!-- You originally has it set up for two columns, remove the second 
    column as it is unneeded and set the first to always span all 12 columns 
    even when at its smallest (xs). Set the overflow to hidden so no matter 
    the height of your image it will never show outside this div-->
         <div class="col-xs-12"> 
            <a class="navbar-brand logo" href="index.php">
        <!-- place your image here -->
               <img src="images/image1.png" class="img-fluid" alt="AtentaMente" style="width: 100%;">
            </a> 
         </div>     
      </div>
   </div>
</div>


<div class="container mx-auto">

<!--
Last Updated: August 7, 2018 at 8:12:52 PM

HTML5 - CSS3 - Paulina Garza - Artenativa S.A. de C.V.

www.artenativa.com.mx

-->
<div class="wrapper"> <header> <div class="left halfPage"> <div class="left imagen tele"> <img src="img/mujer.png"/> </div> <div class="txtCenter left titulo"> <h1 class="blanco"> <span class="el">EL<br/></span> <span class="bienestar">BIENESTAR<br/></span> <span class="es">ES DE QUIEN<br/></span> <span class="lo">LO TRABAJA</span> </h1> <p class="azul vive"> <span>Vive atento y relajado</span> </p> </div> </div> <div clas="left halfPage padding0"> <div class="video padding0"> <iframe frameborder="0" scrolling="no" src="https://www.youtube.com/embed/_kwC3_xUu2c" allow="autoplay; encrypted-media"> </iframe> </div> </div> </header> <div class="left fondo"> <div class="taller left"> <div class="left titulo"> <div class="left "> <h2>TALLER </h2> </div> <div class="left"> <img src="img/taller.png"/> </div> </div> <div class="left padding0"> <h3 class="padding0"><br/>TEÓRICO-PRÁCTICO</h3> </div> <div class="left"> <p> Queremos compartir contigo herramientas que te permitan desarrollar las habilidades necesarias para tener una vida más plena. En este primer módulo de nuestro programa Trabajar y vivir en equilibrio, nos centarremos en calificar qué es ese bienestar que anhelamos y qué se necesita para cultivarlo. </p> <p> Además de la reflexión teórica, compartiremos técnicas para pasar de las buenas intenciones a la realidad. Al practicarlas, tendrás una mente más tranquila, clara y con espacio para manejar los retos de la vida en familia, en la escuela, con la pareja y en el trabajo. </p> <p> La información que recibirás está sustentada en diversas investigaciones en neurociencias, educación, psicología y reducción de estrés. </p> <p> Lo impartirá la Psic. Lourdes Gómez Paz, instructora de AtentaMente con 10 años de práctica de técnicas para el cultivo de la atención y habilidades socioemocionales. Lulú tiene también 20 años de experiencia en trabajo con grupos. </p> </div> </div> <div class="sabados left "> <div class="cabecera left"> <div class=" txtRight left cuatro"> <p>4</p> </div> <div class="texto left"> <p>SÁBADOS<br/>SESIONES<br/>HORAS<br/></p> </div> <div class="duracion left txtCenter"> <p>Duración de 16 horas a lo largo de 4 semanas.</p> </div> </div> <div class="cuerpo left"> <article> <p class="uno">Aprovecha esta oportunidad para conecer mejor y dessarollarte al máximo.</p> <p class="dos">PARA QUE TENGAS UNA IDEA MÁS CLARA SOBRE LO QUE APRENDERÁS EN ELTALLER</p> <p class="tres txtBold">TE INVITAMOS A UNA SESIÓN INFORMATIVA</p> <p class="cuatro">Este 11 de Agosto<br/> de 19:00 - 19:30 HRS</p> <img src="img/video.png" class="left"/> <p class="cinco">POR VIDEO <br/>CONFERENCIA</p> <p class="txtBold">Puedes conectarte en el siguente enlace: <a class="enlace" href="https://www.facebook.com/AtentaMenteMX/videos/1466269186808055/">https://www.facebook.com/AtentaMenteMX</a></p> </article> </div> </div> </div> <div class="txtCenter left info"> <div class="caja forthPage left "> <p class="titulo">HORARIO</p> <p>Sábado</p> <p>9:00 - 13:00 hrs.</p> </div> <div class="caja forthPage left "> <p class="titulo">INVERSIÓN</p> <p>$3,200</p> <p>PRESENCIAL</p> <p>$2,800</p> <p>STREAMING EN VIVO</p> </div> <div class="caja forthPage left "> <p class="titulo">SEDE</p> <p>Club de Banqueros de la CDMX</p> <p>16 de Septiembre 27, Cento Histórico</p> </div> <div class="caja forthPage left"> <p class="titulo">IMPARTE</p> <p>Psic. Lourdes<br/> Gómez Paz</p> </div> </div> <div class="left temario"> <div class="halfPage left"> <div class="left linea"> <h2>TEMARIO</h2> </div> <img src="img/temario.png" class="img"/> <div class="left listaa"> <ol> <li><span class="gris">El mapa y la ruta.</span></li> <li><span class="gris">Establecer la dirección y emprender el viaje.</span></li> <li><span class="gris">El papel de la mente.</span></li> <li><span class="gris">Profundizando el papel de la mente.</span></li> <li><span class="gris">La importancia de entrenar la atención.</span></li> </ol> </div> </div> <div class="halfPage left listab"> <ol start="6"> <li><span class="gris">Cómo entrenar la atención.</span></li> <li><span class="gris">Trabajar con las dificultades de la práctica.</span></li> <li><span class="gris">Consejos prácticos y consejos en el entrenamiento.</span></li> <li><span class="gris">Disipar la confusión.</span></li> <li><span class="gris">Cultiva una mente clara.</span></li> <li><span class="gris">La naturaleza cambiante de las cosas.</span></li> <li><span class="gris">Diferentes herramientas, múltiples soluciones.</span></li> </ol> </div> </div> <div> <div class="left fotos txtCenter fondo"> <div class="thirdPage left uno"> <img src="img/uno.jpg"/> </div> <div class="thirdPage left uno"> <img src="img/dos.jpg"/> </div> <div class="thirdPage left uno"> <img src="img/tres.jpg"/> </div> </div> </div> <div class="testimoniales left"> <div class="titulo left"> <div class="left"> <h2>TESTIMONIALES</h2> </div> <div class="img left"> <img src="img/test.png"/> </div> </div> <div class="left"> <div class="left thirdPage"> <div> <p class="texto"> “Con este curso he aprendido a ser más analítico y tranquilo para abordar las situaciones, lo que me permite ser más asertivo”. </p> </div> <div class="uno"> <p class="txtBold texto"> -Álvaro SHCP- </p> </div> </div> <div class="left thirdPage"> <div> <p class="texto"> "Estar más atenta en mis acciones, en mi visión de mí misma. Controlar mi estrés, mi día acelerado, estra más relajada". </p> </div> <div class="dos"> <p class="txtBold texto"> -Maestra Instituto Docet, Nuevo León- </p> </div> </div> <div class="left thirdPage"> <div> <p class="texto "> "Esto es justo lo que los niños necesitan hoy en día qu están sometidos a tantos estímulos." </p> </div> <div class="tres"> <p class="txtBold texto"> -Mamá Montessori de la Condesa, D.F.- </p> </div> </div> </div> </div> <footer> </footer> </div> <link href="css/styles.min.css" rel="stylesheet" type="text/css"> <script src="https://ajax.googleapis.com/ajax/libs/webspan/1.6.26/webspan.js"></script> <script>Webspan.load({google:{families:["Open Sans:400,700,800"]}});</script>


</div>

<footer id="footer">
<div class="container mx-auto">
  <div class="row">    
    <div class="col-xs-6 col-sm-6 col-md-6 column">          
         <h4 class="footer-text">Políticas</h4>
        <ul class="list-group">
          <li ><a href="cancel.php">Política de Cancelación</a></li>
          <li ><a href="#">Política de Entrega</a></li>
        </ul> 
      </div>
    <div class="col-xs-6 col-md-6 column">          
         <h4 class="footer-text">¿Cómo podemos ayudarte?</h4>
        <ul class="nav">
          <li><a href="mailto:ayuda@atentamente.org.mx">ayuda@atentamente.org.mx</a></li>
        </ul> 
      </div>
      
    
  </div>
</div>
</footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

</body>
</html>
