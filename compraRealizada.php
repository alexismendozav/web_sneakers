<?php 
include 'agregarCarrito.php';
include 'verificarSesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pago</title>
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
    <link rel="stylesheet" type="text/css" href="css/pago.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
					SI COMPRAS DOS O MAS PARES DE TU ENVÍO SERA GRATIS!
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

						<!-- Header cart -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
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
								<input class="input-delete" type="submit" name="deleteN" value="X"  />
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
										Pagar
									</a>
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
                        <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                        <span class="linedivide1"></span>
                    <!-- Inicio sesion -->
                        <?php if($inicio=="si") {?>
                            <a href="cerrarSesion.php" class="header-wrapicon1 dis-block">
                                 Cerrar Sesión                             
                            </a>
                        <?php } else if($inicio=="no")  {?>
                            <a href="login.php" class="header-wrapicon1 dis-block">
                                Inicie Sesión                             
                            </a>
                        <?php }?>
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
									<a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Pagar
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
							SI COMPRAS DOS O MAS PARES TU ENVÍO ES GRATIS!
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								snickers@gmial.com
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
						<a href="nosotros.php">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contacto.php">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
    <!-- CONTENT PAGE -->
    
                <script>
                swal({
                    title: "Gracias por su compra",
                    text: "Siga Comprando",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = 'productos.php';
                    } else {
                        window.location.href = 'index.php';
                    }
                    });
                </script>
                   
    <!-- EN CONTENT PAGE -->




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
    <script src="js/pago.js"></script>

</body>
</html>
