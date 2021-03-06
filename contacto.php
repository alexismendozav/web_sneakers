<?php 
	include 'agregarCarrito.php';
	include 'verificarSesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contactanos</title>
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
					SI COMPRAS DOS O MAS PARES TU ENVÍO SERA GRATIS!
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
								<input class="input-delete" type="submit" name="delete" value="X"  />
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
									<a href="pago" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
									<?php } else if($inicio=="no"){?>
									<a href="login" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
								<input class="input-delete" type="submit" name="delete" value="X"  />
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
									<a href="pago" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
									<?php } else if($inicio=="no"){?>
									<a href="login" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
							SI COMPRAS DOS O MAS PARES TU ENVÍO SERA GRATIS!
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
						<a href="cerrarSesion.php">Cerras Sesión</a>
					</li>
					<?php }?>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner_cart.png);">
		<h2 class="l-text2 t-center">
			Contactanos
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Mandanos tu mensaje
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Nombre Completo">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Numero Telefonico">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Dirección de correo">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Mensaje"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Enviar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
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
							<a href="https://www.facebook.com" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
							<a href="https://www.instagram.com" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
							<a href="https://www.pinterest.com" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
							<a href="https://www.snapchat.com" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
							<a href="https://www.youtube.com" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
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
							<a href="#" class="s-text7">
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
								Subscribete
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
