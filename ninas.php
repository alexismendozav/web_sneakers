<?php 
include 'agregarCarrito.php';
include 'verificarSesion.php';
$servicio = new SoapClient('http://interfacesavanzadasP.somee.com/Service1.svc?singleWsdl');
$id_objetivo=array('objetivo'=>4);
$productos = $servicio -> GetBusqueda($id_objetivo);
//var_dump($productos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Productos para niña</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com" class="topbar-social-item fa fa-instagram"></a>
					<a href="https://www.pinterest.com" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="https://www.snapchat.com" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="https://www.youtube.com" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					SI COMPRAS DOS O MAS PARES TU ENVÍO ES GRATIS!
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?php 
							if($inicio=="si")
								echo $usuario;
							else
								echo 'snickers@gmail.com';
						?>
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>MXN</option>	
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							
							<li >
								<a href="productos.php">Tienda</a>
							</li>
						
							<li>
								<a href="carrito.php">Carrito</a>
							</li>
							
							<li>
								<a href="nosotros.php">Nosotros</a>
							</li>
							<li>
								<a href="contacto.php">Contacto</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                    	<span class="linedivide1"></span>
                   		 <!-- Inicio sesion -->
                        <?php if($inicio=="si") {?>
                            <a href="cerrarSesion.php" class="header-wrapicon1 dis-block">	 
								Cerrar Sesión                             
                            </a>
                        <?php } else if($inicio=="no") {?>
                            <a href="login.php" class="header-wrapicon1 dis-block">
                                Inicie Sesión                             
                            </a>
                        <?php }?>
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							<?php  
							$total=0;
							if(!empty($_SESSION['CARRITO'])) {
								foreach($_SESSION['CARRITO'] as $indice=>$producto){	
							?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/sneakers/<?php echo $producto['modelo']?>.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
										<?php echo $producto['nombre'];?>
										</a>

										<span class="header-cart-item-info">
										<?php echo "$".$producto['precio'];?>
										</span>
										<form action="agregarCarrito.php" method="post">
											<input  type="hidden" name="modelo" id="modelo" value="<?php echo $producto['modelo'];?>"> 
											<input class="input-delete" type="submit" name="deleteP" value="X"  />
										</form>
									</div>
								</li>
								<?php $total = $total + ($producto['precio']); } }?>
								
							</ul>

							<div class="header-cart-total">
								Total: <?php echo "$".$total; ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="carrito.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Ver
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<?php if($inicio=="si"){?>
									<a href="pago.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
									<?php } else if($inicio=="no"){?>
									<a href="login.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							<?php  
							$total=0;
							if(!empty($_SESSION['CARRITO'])) {
								foreach($_SESSION['CARRITO'] as $indice=>$producto){	
							?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/sneakers/<?php echo $producto['modelo'];?>.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
										<?php echo $producto['nombre'];?>
										</a>

										<span class="header-cart-item-info">
										<?php echo "$".$producto['precio'];?>
										</span>

										<form action="agregarCarrito.php" method="post">
											<input  type="hidden" name="modelo" id="modelo" value="<?php echo $producto['modelo'];?>"> 
											<input class="input-delete" type="submit" name="deleteP" value="X"  />
										</form>
									</div>
								</li>
								<?php $total = $total + ($producto['precio']); } }?>
							</ul>

							<div class="header-cart-total">
							Total: <?php echo "$".$total; ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="carrito.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Ver 
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<?php if($inicio=="si"){?>
									<a href="pago.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
									<?php } else if($inicio=="no"){?>
									<a href="login.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							SI COMPRAR DOS O MAS PARES, TU ENVÍO SERA GARTIS
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
							<?php 
								if($inicio=="si")
									echo $usuario;
								else
									echo 'snickers@gmail.com';
							?>
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>MXN</option>	
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="https://www.facebook.com" class="topbar-social-item fa fa-facebook"></a>
							<a href="https://www.instagram.com" class="topbar-social-item fa fa-instagram"></a>
							<a href="https://www.pinterest.com" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="https://www.snapchat.com" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="https://www.youtube.com" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Inicio</a>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="productos.php">Tienda</a>
					</li>				

					<li class="item-menu-mobile">
						<a href="carrito.php">Carrito</a>
					</li>				
					<li class="item-menu-mobile">
						<a href="nosotros.php">Nosotros</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contacto.php">Contacto</a>
					</li>
					<?php if($inicio=="si"){?>
					<li class="item-menu-mobile">
						<a href="cerrarSesion.php">Cerrar Sesión</a>
					</li>
					<?php }?>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/banner_cart.png);">
		<h2 class="l-text2 t-center">
			
		</h2>
		<p class="m-text13 t-center">
			
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categorias
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="productos.php" class="s-text13 active1">
									Todo
								</a>
							</li>

							<li class="p-t-4">
								<a href="mujeres.php" class="s-text13">
									Mujeres
								</a>
							</li>

							<li class="p-t-4">
								<a href="hombres.php" class="s-text13">
									Hombres
								</a>
							</li>

							<li class="p-t-4">
								<a href="ninas.php" class="s-text13">
									Niñas
								</a>
							</li>

							<li class="p-t-4">
								<a href="ninos.php" class="s-text13">
									Niños
								</a>
							</li>
						</ul>

						<!--  -->
						

						<!--
					
						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Buscar Productos...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>-->
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					
					<!-- Productos -->
					<div class="row">
					<!-- EMPIEZA EL CART-->
					<?php
					$i=0;
					foreach($productos as $lista => $producto){
						foreach($producto as $tenis)
						{
							while(isset($tenis[$i])){ 
					?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<form action="agregarCarrito.php" method="post">
													<input type="hidden" name="objetivo" id="objetivo" value="<?php echo $tenis[$i]->id_objetivo=1;?>">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="tienda">Agregar al carrito</button>
											</form>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $tenis[$i]->nombre;?>
									</a>

									<span class="block2-price m-text6 p-r-5">
									<?php echo "$".$tenis[$i]->precio;$i++?>
									</span>
								</div>
							</div>
						</div>
					<?php }}} ?>
                       <!-- TERMINA EL CART -->
					<!-- Pagination 
					
					<div class="pagination flex-m flex-w p-t-26">				
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>-->
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Contacto
				</h4>

				<div>
					<p class="s-text7 w-size27">
					¿Alguna pregunta? Avísenos en la tienda, 5 Oriente #535, Tehuacan, Puebla  o llámenos al (+52) 2382114426
					</p>

					<div class="flex-m p-t-30">
						<a href="https://www.facebook.com" class="topbar-social-item fa fa-facebook"></a>
						<a href="https://www.instagram.com" class="topbar-social-item fa fa-instagram"></a>
						<a href="https://www.pinterest.com" class="topbar-social-item fa fa-pinterest-p"></a>
						<a href="https://www.snapchat.com" class="topbar-social-item fa fa-snapchat-ghost"></a>
						<a href="https://www.youtube.com" class="topbar-social-item fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categorias
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="hombres.php" class="s-text7">
							Hombres
						</a>
					</li>

					<li class="p-b-9">
						<a href="mujeres.php" class="s-text7">
							Mujeres
						</a>
					</li>

					<li class="p-b-9">
						<a href="ninos.php" class="s-text7">
							Niños
						</a>
					</li>

					<li class="p-b-9">
						<a href="ninas.php" class="s-text7">
							Niñas
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="productos.php" class="s-text7">
							Tienda
						</a>
					</li>

					<li class="p-b-9">
						<a href="nosotros.php" class="s-text7">
							Nosotros
						</a>
					</li>

					<li class="p-b-9">
						<a href="contacto.php" class="s-text7">
							Contactanos
						</a>
					</li>
					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Ayuda
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="http://sneakers2.000webhostapp.com/" class="s-text7">
							Foro
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							
						</a>
					</li>
					
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					¿Desea recibir información?
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@ejemplo.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Suscribete
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 Todos los derechos reservados.<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>




	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>