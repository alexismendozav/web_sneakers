<?php 
include 'agregarCarrito.php';
include 'verificarSesion.php';
$total=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrito</title>
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
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
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
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
										<?php echo $producto['nombre'];?>
										</a>

										<span class="header-cart-item-info">
										<?php echo "$".$producto['precio'];?>
										</span>
                                        <!--FORM PARA ELIMINAR EL PRODUCTO DEL CARRITO -->
										<form action="agregarCarrito.php" method="post">
											<input  type="hidden" name="modelo" id="modelo" value="<?php echo $producto['modelo'];?>"> 
											<input class="input-delete" type="submit" name="deleteC" value="X"  />
										</form>
										 <!--TERMINA EL FORM -->
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
											<input class="input-delete" type="submit" name="deleteC" value="X"  />
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
										Ver Carrito
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
							TU ENVÍO ES GRATIS SI COMPRAS DOS O MAS ARTICULOS!
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
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
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
						<a href="cerrarSesion.php">Cerrar Sesión</a>
					</li>
					<?php }?>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/banner_cart.png);">
		<h2 class="l-text2 t-center">
			
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Producto</th>
							<th class="column-3">Precio</th>
							<th class="column-4 p-l-70">Cantidad</th>
							<th class="column-5">Total</th>
							<th class="column-1">Eliminar</th>
						</tr>
					   <!-- AQUI EMPIEZA LA FILA DEL CARRITO -->
					   <?php  if(!empty($_SESSION['CARRITO'])) {
								foreach($_SESSION['CARRITO'] as $indice=>$producto){	
						?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="images/sneakers/<?php echo $producto['modelo'];?>.jpg" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php echo $producto['nombre'];?></td>
							<td class="column-3"><?php echo "$".$producto['precio'];?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5"><?php echo "$".$producto['precio'];?></td>
							<td class="column-1">
								<form action="agregarCarrito.php" method="post">
									<input  type="hidden" name="modelo" id="modelo" value="<?php echo $producto['modelo'];?>"> 
									<input class="input-delete" type="submit" name="deleteC" value="X"  />
								</form>
							</td>
						</tr>
						<?php }} ?>
						<!-- AQUI TERMINA LA FILA DEL CARRITO-->
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Codigo del cupon">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Aplicar Cupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Actualizar Carrito
					</button>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Total: 
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal: 
					</span>

					<span class="m-text21 w-size20 w-full-sm">
					<?php echo "$".$total; ?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Envío:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							Hay que activar los metodos de envío
						</p>

						<span class="s-text19">
							Calcular envío
						</span>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="country">
								<option>Seleccionar pais</option>
								<option>MXN</option>
								<option>UK</option>
								<option>US</option>
							</select>
						</div>

						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="Pais /  Estado">
						</div>

						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="CP">
						</div>

						<div class="size14 trans-0-4 m-b-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Actualizar costo
							</button>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total: 
					</span>

					<span class="m-text21 w-size20 w-full-sm">
					<?php echo "$".$total; ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<?php if($inicio=="si"){?>
							<a href="pago" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Proceder a pagar
							</a>
							<?php } else if($inicio=="no"){?>
							<a href="login" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Proceder a pagar
							</a>
					<?php }?>
					
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
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
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
	<script src="js/main.js"></script>

</body>
</html>
