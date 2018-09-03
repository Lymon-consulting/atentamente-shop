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
               <img src="images/banner_tienda.jpg" class="img-fluid" alt="AtentaMente">
            </a> 
         </div>     
      </div>
   </div>
</div>


<div class="container mx-auto">
   



<!--
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
    
-->






<?php

$id = htmlspecialchars($_GET["id"]);

//Recupera los datos del producto cuyo id obtiene de la URL del navegador
$strQuery = "SELECT id, product_name, product_desc, product_code, product_image, product_price, product_large, product_banner FROM products_list WHERE id=" . $id;
$acentos = $mysqli_conn->query("SET NAMES 'utf8'");
$results = $mysqli_conn->query($strQuery);

//Intercepta cualquier error en la conexión de la base de datos
if (!$results){
    printf("Error: %s\n", $mysqli_conn->error);
    exit;
}

echo "<div id=\"store\"><div>";

//Despliega el producto encontrado
//$products_list =  '<ul class="products-wrp">';

echo "<ul class=\"products-wrp\">";

echo "<div class=\"container mx-auto\">";
  echo "<div class=\"row mx-auto\">";

$row = $results->fetch_assoc();
?>

<div class="container">
   <div class="row">
      <div class="col-md-10">
         <li>
            <!--<form class="form-item">-->
            <h4><?=$row["product_name"]?></h4>
            <?php
              if ($row["product_banner"]!=null and strlen($row["product_banner"])>0){ 
            ?>
               <div><img src="images/products/<?=$row["product_banner"]?>"></div>
            <?php
              }
              else{ 
            ?>
               <div><img src="images/products/<?=$row["product_image"]?>"></div>
            <?php
              }
            ?>
            
            
            <div class="description"><br><?=$row["product_large"]?></div>
            <div class="price">Precio : <?=$currency?> <?=$row["product_price"]?><div>
            <div class="item-box">
               
                <input name="product_code" type="hidden" value="<?=$row["product_code"]?>">
                <?php 
            if($row["id"]==2){
          ?>
          <a class="btn" href="https://play.google.com/store/books/details/iBooks_Author_2_6_Trabajar_y_Vivir_en_Equilibrio_M?id=grtoDwAAQBAJ">Comprar</a>
         <?php 
            }
            else if($row["id"]==3){
          ?>
          <a class="btn" href="https://play.google.com/store/books/details/iBooks_Author_2_6_TRABAJAR_Y_VIVIR_EN_EQUILIBRIO?id=srtoDwAAQBAJ">Comprar</a>
         <?php 
            }
            else if($row["id"]==4){
          ?>          
          <a class="btn" href="https://play.google.com/store/books/details/iBooks_Author_2_6_Trabajar_y_Vivir_en_Equilibrio_M?id=wrtoDwAAQBAJ">Comprar</a>
          <?php 
            }
            else{
          ?>          
          <a class="btn" href="https://atentamente.iliux.com/shop/view_cart.php?item=<?=$row["product_code"]?>">Comprar</a>
          <?php
            }
          ?>
                <a href="index.php" class="btn btn-outline-secondary" role="button" aria-pressed="true">Regresar a la tienda</a>
            </div>
            <!--</form>-->
         </li>
      </div>
   </div>
</div>
<?php


  echo "</div>";
echo "</div>";

//$products_list .= '</ul></div>';
echo "</ul></div>";
//echo $products_list;
?>


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
