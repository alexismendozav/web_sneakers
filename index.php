<?php 
include 'agregarCarrito.php';
$servicio = new SoapClient('http://interfacesavanzadasP.somee.com/Service1.svc?singleWsdl');
/*$stringc="gerson@gmail.com";
$stringn="12345";
$parametros = array('correo'=>$stringc,'contrasena'=>$stringn);
$productos = $servicio -> VerificarLogin($parametros);
$id_objetivo=2;
$parametros=array('objetivo'=>$id_objetivo);
$productos = $servicio -> GetBusqueda($parametros);
print_r($productos);*/
$total=0;
$productos = $servicio -> GetProductos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sneakers</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/fav1.png"/>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.php" class="logo2">
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
			<a href="#" class="header-wrapicon1 dis-block">
				<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

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
								<img src="images/item-cart-01.jpg" alt="IMG">						
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
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Comprar
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- top noti -->
	<div class="flex-c-m size22 bg0 s-text21 pos-relative">
		20% de descuento en todo!
		<a href="productos.php" class="s-text22 hov6 p-l-5">
			Comprar Ahora 
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="https://www.facebook.com" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com" class="topbar-social-item fa fa-instagram"></a>
					<a href="https://www.pinterest.com.mx" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="https://www.snapchat.com" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="https://www.youtube.com" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="index.php" class="logo2">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">
					<span class="topbar-email">
						sneackers@gmail.com
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>MXN</option>
							<option>USD</option>
							<option>EUR</option>				
						</select>
					</div>

					<!-- MENU CUANDO LA PAGINA ESTA NORMAL  -->
					<a href="#" class="header-wrapicon1 dis-block m-l-30">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
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
										<img src="images/item-cart-01.jpg" alt="IMG">
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
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="wrap_header">
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

						<!-- Header cart phone -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							<?php  
							$total=0;
							if(!empty($_SESSION['CARRITO'])) {
								foreach($_SESSION['CARRITO'] as $indice=>$producto){	
							?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
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
									<a href="carrrito.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Ver
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Comprar
									</a>
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
							Compra dos pares o mas y el envío sera gratis!
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								sneakers@gmail.com
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
						<!-- <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i> -->
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
				</ul>
			</nav>
		</div>
	</header>

	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/bannerP3.png);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
							PASIÓN POR EL FÚTBOL
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							Nueva Collección 2019
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="productos.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								COMPRA AHORA
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/bannerP2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h1 color="Black" class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rollIn">
							NUEVOS MODELOS
						</h1>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
							Colección 2019
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="productos.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Comprar ahora
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/bannerP6.png);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rotateInDownLeft">
							SE DIFERENTE
						</h2>

						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="rotateInUpRight">
						Nueva Collección 2019
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="productos.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Comprar ahora
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Banner -->
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/bannerMan.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Hombres
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/bannerWoman.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Mujeres
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="images/bannerBoys.jpg" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Niños
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Nuestros Productos
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Mas vendido</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Destacados</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Oferta</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Podría interesarte</a>
					</li>
				</ul>
				<?php 
				foreach($productos as $lista => $producto){
					foreach($producto as $tenis)
					{
						for($i=19 ; $i<=26 ; $i++){ ?> 
				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- MAS VENDIDO- -->				
					<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->												
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>									
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio;
										$i++;
										?>	
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
							
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
											
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++;?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++;?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre; ?>	
										</a>
										<span class="block2-oldprice m-text7 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
										<span class="block2-newprice m-text8 p-r-5">
											$799
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++;?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++;?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++;?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>										
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } } }	
					foreach($productos as $lista => $producto){
						foreach($producto as $tenis)
						{
							for($i=0 ; $i<=7 ; $i++){
					?>  
					<!--EMPIEZA PRODUCTOS DESTACADOS - -->
				
					<div class="tab-pane fade" id="featured" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-oldprice m-text7 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>

										<span class="block2-newprice m-text8 p-r-5">
											$799.90
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-oldprice m-text7 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>

										<span class="block2-newprice m-text8 p-r-5">
											$699.90
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } } }
					foreach($productos as $lista => $producto){
						foreach($producto as $tenis)
						{
							for($i=10 ; $i<=13 ; $i++){
					?>
					<!-- TERMINA PRODUCOTS DESTACADOS -->
					<!-- EMPIEZA PRODUCTOS EN OFERTA -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>	
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } } }
						foreach($productos as $lista => $producto){
							foreach($producto as $tenis)
							{
								for($i=15 ; $i<=22 ; $i++){
					?>
					<!-- TERMINA PRODUCTOS EN OFERTA -->
					<!-- EMPIEZAN PRODUCTOS QUE PODRIAN GUSTARTE -->
					<div class="tab-pane fade" id="top-rate" role="tabpanel">
						<div class="row">
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-oldprice m-text7 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>

										<span class="block2-newprice m-text8 p-r-5">
											$800.00
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add" value="inicio">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-oldprice m-text7 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>

										<span class="block2-newprice m-text8 p-r-5">
											$599.90
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										<img src="images/sneakers/<?php echo $tenis[$i]->id_producto;?>.jpg" alt="IMG-PRODUCT">

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
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
												<!-- FORM -->
												<form action="agregarCarrito.php" method="post">
													<input  type="hidden" name="imagen" id="imagen" value="<?php echo $tenis[$i]->id_producto;?>"> 
													<input type="hidden" name="nombre" id="nombre" value="<?php echo $tenis[$i]->nombre; ?>">                                                 
													<input type="hidden" name="precio" id="precio" value="<?php echo $tenis[$i]->precio; ?>">                                                 
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" name="add">Agregar al carrito</button>
												</form>
												<!-- FIN FORM -->	
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.php?id=<?php echo $tenis[$i]->nombre;?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $tenis[$i]->nombre;?>
										</a>

										<span class="block2-price m-text6 p-r-5">
										<?php echo "$".$tenis[$i]->precio; $i++?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } } }?>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner video -->
	<section class="parallax0 parallax100" style="background-image: url(images/bannerP4.png);">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					Belleza
				</span>

				<h3 class="l-text1 fs-35-sm">
					LO MEJOR EN TUS PIES
				</h3>

				<span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					Play Video
				</span>
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Visita nuestras paginas
				</h3>
			</div>

			<div class="row">
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="http://dev-snickers.pantheonsite.io/" class="block3-img dis-block hov-img-zoom">
							<img src="images/drupal.png" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									¡Sneakers tiene rebajas!
								</a>
							</h4>

							<span class="s-text6"></span> <span class="s-text7"></span>
							<span class="s-text6"></span> <span class="s-text7"></span>

							<p class="s-text8 p-t-16">
								Visita nuestra página de rebajas, te sorprenderan los precios que tenemos para ti.
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="http://sneakers2.000webhostapp.com/" class="block3-img dis-block hov-img-zoom">
							<img src="images/phpBB.png" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									¡Queremos escucharte!
								</a>
							</h4>

							<span class="s-text6"></span> <span class="s-text7"></span>
							<span class="s-text6"></span> <span class="s-text7"></span>

							<p class="s-text8 p-t-16">
								Porque tú opinión es importante, te invitamos a formar parte de nuestro foro.
								Registrate y forma parte de esta comunidad.
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="https://snickerswp.cloudaccess.host/" class="block3-img dis-block hov-img-zoom">
							<img src="images/bannerPro.png" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									¡Todos los modelos!
								</a>
							</h4>
								<span class="s-text6"></span> <span class="s-text7"></span>
								<span class="s-text6"></span> <span class="s-text7"></span>

							<p class="s-text8 p-t-16">
								No encuentras algun modelo pasado, entra a esta página.
								Siempre reservamos los mejores modelos de las temporadas.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Instagram -->
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ Siguenos en Instagram
			</h3>
		</div>

		<div class="flex-w">
			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="images/week2626.png" alt="IMG-INSTAGRAM">

				<a href="https://www.instagram.com/p/BvrY_keFEem/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">139</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @week2626
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="images/pabuc.png" alt="IMG-INSTAGRAM">

				<a href="https://www.instagram.com/p/Bvraw5UgV9t/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">299</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @pabuc.gezegeni_
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="images/tashi680.png" alt="IMG-INSTAGRAM">

				<a href="https://www.instagram.com/p/BvrZErVA5cW/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">339</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @tashi680
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="images/footwearin.png" alt="IMG-INSTAGRAM">

				<a href="https://www.instagram.com/p/BvrSaWqD1iv/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">435</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @footwearin
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<!--<div class="block4 wrap-pic-w">
				<img src="images/boostsfeed.png" alt="IMG-INSTAGRAM">

				<a href="https://www.instagram.com/p/BvkN72kp3xO/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">567</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @boostsfeed
						</span>
					</div>
				</a>
			</div>-->
		</div>
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Escoje el mejor estilo.
				</h4>

				<a href="Snickers.zip"" class="s-text11 t-center">
					
					Descarga la aplicación de escritorio
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					Devoluciones 
				</h4>

				<span class="s-text11 t-center">
					Se pueden realizar dentro de los primeros 30 días.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Te esperamos en la sucursal
				</h4>

				<span class="s-text11 t-center">
					Abrimos todos los días con un horario de 9:30 am a 8:30 pm 
					Visitanos en la calle 5 oriente 535, Tehuacán Puebla.
				</span>
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
						<a href="#" class="s-text7">
							Hombres
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Mujeres
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Niños
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
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
						<a href="about.html" class="s-text7">
							Nosotros
						</a>
					</li>

					<li class="p-b-9">
						<a href="contact.html" class="s-text7">
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
							Devoluciones
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

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
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Se agregado al carrito !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "Se ha añadido a favoritoa !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
