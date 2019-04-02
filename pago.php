<?php 
include 'agregarCarrito.php';
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
					SI COMPRAS DOS O MAS PARES DE TU ENVÍO SERA GRATIS!
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						snicker@gmail.com
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
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

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

    <div class="modal">
    <div class="modal__container">
      <div class="modal__featured">
    
        <div class="modal__circle"></div>
        <img src="https://cloud.githubusercontent.com/assets/3484527/19622568/9c972d44-987a-11e6-9dcc-93d496ef408f.png" class="modal__product" />
      </div>
      <div class="modal__content">
        <h2>Detalles de pago</h2>

        <form>
          <ul class="form-list">
            <li class="form-list__row">
              <label>Nombre</label>
              <input type="text" name="" required="" placeholder="Name"/>
            </li>
            <li class="form-list__row">
              <label>Numero de tarjeta</label>
              <div id="input--cc" class="creditcard-icon">
                <input type="text" name="cc_number" required="" placeholder="---- ---- ---- ----"/>
              </div>
            </li>
            <li class="form-list__row form-list__row--inline">
              <div>
                <label>Fecha de vencimiento</label>
                <div class="form-list__input-inline">
                  <input type="text" name="cc_month" placeholder="Mes"  pattern="\d*" minlength="2" maxlength="2" required="" />
                  <input type="text" name="cc_year" placeholder="Año"  pattern="\d*" minlength="2" maxlength="2" required="" />
                </div>
              </div>
              <div>
                <label>
                  CVC                
                </label>
                <input type="text" name="cc_cvc" placeholder="123" pattern="\d*" minlength="3" maxlength="4" required="" />
              </div>
            </li>

            <li>
              <button type="submit" class="button">Pagar</button>
            </li>
            </ul>
            </form>
        </div> <!-- END: .modal__content -->
        </div> <!-- END: .modal__container -->
    </div> <!-- END: .modal -->                       
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
