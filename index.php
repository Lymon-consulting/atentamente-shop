
<?php
session_start(); //se activa la sesión del navegador
include("config.inc.php"); //llama al archivo que contiene la configuración de la conexión a la base de datos y otros parámetros
?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Tienda en línea de AtentaMente">
<meta name="author" content="Luis Carlos Jiménez">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"/>

<!-- Etiqueta global del sitio (gtag.js) - Utilizada para las métricas de Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122684734-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122684734-1');
</script>


<title>Tienda en Línea AtentaMente</title>

<!--Estilos globales del sitio-->
<link href="style/style.css" rel="stylesheet" type="text/css">

<!--Incluye bootstrap como framework para el front-end-->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Fuentes especiales para esta plantilla -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


<!-- Plugin CSS -->
<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Estilos personalizados para esta plantilla -->
<link href="style/creative.min.css" rel="stylesheet">

<!--Se incluye jquery para ciertas funciones especiales-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

<!--Código que recupera los valores de la lista desplegable de categorías-->
<script>
function CategorySelect(elem){
   valor = elem.value;
   if(valor > 0){
      var goTo = "index.php?category=" + valor;
      //alert(goTo);
      window.location.href = goTo;
   }
   if(valor == 0){
      var goTo = "index.php";
      window.location.href = goTo;  
   }
}

function setCategory(){
   <?php
   if(isset($_GET["category"])){
      $category = $_GET["category"];
   }
   else{
      $category = 0;
   } ?>
   var category = <?php echo $category ?>

   var titulo_cat = "Ofertas Especiales en Todos los Productos";

   if(category==1){
      titulo_cat = "Ofertas Especiales en Cursos";
   }
   else if(category==2){
      titulo_cat = "Ofertas Especiales en Libros";
   }
   else if(category==3){
      titulo_cat = "Ofertas Especiales en Otros";
   }
   document.getElementById("category_title").innerText = titulo_cat;
}
/*

$(document).ready(function(){	

      $("#category").change(function(e){
         var op = $(this).find("option:selected").val();
         var url = "index.php?category=" . op;
         $( location ).attr("href", url);
         e.preventDefault();
      });
});*/
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '177615492993373'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=177615492993373&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


</head>

<body id="page-top" onload="setCategory();">


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
   //echo count($_SESSION["products"]); 
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
    </nav>  -->
<!--
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>TIENDA EN LÍNEA ATENTAMENTE</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">¡Bienvenido!</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#store">Ver artículos</a>
          </div>
        </div>
      </div>
    </header>
--> 

<div class="header-row" id="header-row">
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

<!--
<div class="container">
   <div class="row blog">
       <div class="col-md-12">
           <div id="blogCarousel" class="carousel slide" data-ride="carousel">

               <ol class="carousel-indicators">
                   <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                   <li data-target="#blogCarousel" data-slide-to="1"></li>
               </ol>

               <div class="carousel-inner">
                   <div class="carousel-item active">
                       <div class="row">
                           <div class="col-md-4">
                            <a href="#">
                              <img src="images/tshirt-1.jpg" alt="Image" style="max-width:100%;">
                            </a>
                           </div>
                           <div class="col-md-4">
                            <a href="#">
                              <img src="images/tshirt-2.jpg" alt="Image" style="max-width:100%;">
                            </a>
                           </div>
                           <div class="col-md-4">
                            <a href="#">
                              <img src="images/tshirt-3.jpg" alt="Image" style="max-width:100%;">
                            </a>
                           </div>
                       </div>
                   </div>
                   <div class="carousel-item">
                       <div class="row">
                          <div class="col-md-4">
                            <a href="#">
                              <img src="images/tshirt-2.jpg" alt="Image" style="max-width:100%;">
                            </a>
                           </div>
                           <div class="col-md-4">
                            <a href="#">
                              <img src="images/tshirt-3.jpg" alt="Image" style="max-width:100%;">
                            </a>
                           </div>
                           <div class="col-md-4">
                            <a href="#">
                              <img src="images/tshirt-1.jpg" alt="Image" style="max-width:100%;">
                            </a>
                           </div>
                           
                       </div>
                   </div>

               </div>
           </div>

       </div>
   </div>
</div>

    <div class="col-md-6 mx-auto">
       <br/>
       <div class="form-group">
        <h4><a name="cat_title">Categorías:</a></h4>
        <select class="form-control" id="sel1" onchange="CategorySelect(this)">
          <option value="-1">-- Seleccione una categoría --</option>
          <option value="0">Todo</option>
          <option value="1">Cursos</option>
          <option value="2">Libros</option>
          <option value="3">Retiros</option>
          <option value="4">Eventos</option>
          <option value="100">Otros</option>
        </select>
      </div>
       
    </div>
    
-->

<?php
//Establece la codificación de la base de datos en utf8 para procesar acentos y caracteres especiales
$acentos = $mysqli_conn->query("SET NAMES 'utf8'");
$query = "SELECT id, product_name, product_code, product_image, special_product, category FROM products_list WHERE special_product = 1 ";

if(isset($_GET["category"])){
   $val = $_GET["category"];
   $query = $query . " AND category = " . $val;

}


//Obtiene la lista de todos los productos de la base de datos, ordenada por el campo product_order
$results = $mysqli_conn->query($query);
//Intercepta cualquier error en la conexión de la base de datos
if (!$results){
    printf("Error: %s\n", $mysqli_conn->error);
    exit;
}
?>

<!--Producto destacado-->
<!--
<section class="jumbotron text-center">
  <div class="container">
   <h4 id="category_title">Ofertas Especiales</h4>
      <div class="row">

<?php
   while($row = $results->fetch_assoc()) { 
      echo "<div class=\"col\"><a href=\"details.php?id=". $row["id"] ."\"><img src=\"images/" . $row["product_image"] . "\"></a></div>";
   }
?>
        
      </div>
    
  </div>
</section>


-->
<?php
//Establece la codificación de la base de datos en utf8 para procesar acentos y caracteres especiales
$acentos = $mysqli_conn->query("SET NAMES 'utf8'");

$query = "SELECT id, product_name, product_desc, product_code, product_image, product_price, product_large, special_product, category FROM products_list";
if(isset($_GET["category"])){
   $query = $query . " WHERE category = " . $_GET["category"];
}

$query = $query . " ORDER BY product_order";

//Obtiene la lista de todos los productos de la base de datos, ordenada por el campo product_order
$results = $mysqli_conn->query($query);

//Intercepta cualquier error en la conexión de la base de datos
if (!$results){
    printf("Error: %s\n", $mysqli_conn->error);
    exit;
}


//Despliega la lista de artículos encontrados

echo "<div id=\"store\"><div>";
//$products_list =  '<ul class="products-wrp">';
echo "<ul class=\"products-wrp\">";
echo "<div class=\"container\">";
  echo "<div class=\"row\">";

while($row = $results->fetch_assoc()) { 
?>
<div class="col-sm">
   <li>
      <!--<form class="form-item">-->
      <h4 class="product-title"><a href="details.php?id=<?=$row["id"]?>"><?=$row["product_name"]?></a></h4>
      <div><a href="details.php?id=<?=$row["id"]?>"><img src="images/<?=$row["product_image"]?>"></a></div>
      <div class="description"><br><?=$row["product_desc"]?></div>
      <div class="price">Precio : <?=$currency?> <?=$row["product_price"]?> <?php if($row["id"]==1) echo " (Incluye 3 licencias)"; ?> <div>
      <?php if($row["id"]==1) echo "<div class='price'>Licencia adicional $ 1750</div>"; ?>
      <div class="item-box">
         
          <input name="product_code" type="hidden" value="<?=$row["product_code"]?>">
          <a class="btn" href="https://atentamente.iliux.com/shop/view_cart.php?item=<?=$row["product_code"]?>">Comprar</a>
          <?php
           if ($row["product_large"]!=null and strlen($row["product_large"])>0){
            //echo "<button type=\"button\">Más información</button>";
            echo "<a class='btn' href='details.php?id=" . $row["id"] . "'>Más información</a>";
           }
           ?>
      </div>
      <!--</form>-->
   </li>
</div>
<?php
}

  echo "</div>";
echo "</div>";

//$products_list .= '</ul></div>';
echo "</ul></div>";
//echo $products_list;
?>


<!--
   <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">¡Queremos saber de ti!</h2>
            <hr class="my-4">
            <p class="mb-5">¿Estás interesado en algún otro curso? Llámanos o envíanos un correo y te contactaremos tan pronto sea posible.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>+52 55 9688 6479</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:ayuda@atentamente.org.mx">ayuda@atentamente.org.mx</a>
            </p>
          </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-money fa-3x mb-3 sr-contact"></i>
            <p>Consulta nuestra <a href="cancel.php">política de devolución</a></p>
          </div>
        </div>
      </div>
    </section> -->

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
   <script>
      $('#blogCarousel').carousel({
            interval: 3000
      });
   </script>
    
</body>
</html>
