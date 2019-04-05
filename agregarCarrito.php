<?php 
    session_start();
    $posicionTenis=0;
    if(isset($_POST['add'])){
        $modelo = $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        if(!isset($_SESSION['CARRITO'])){
            $producto = array (
                'modelo' => $modelo,
                'nombre' => $nombre,
                'precio' => $precio, 
                'cantidad' => 1,              
             );
             $_SESSION['CARRITO'][0]=$producto;
             if($_POST['add']=="tienda")
             {
                header("Location:productos.php");
             }
             if($_POST['add']=="inicio")
             {
                header("Location:index.php");
             }
             if($_POST['add']=="detalle")
             {
                header("Location:product-detail.php?id=$nombre");
             }               
        }
        else
        {
            $modeloProducto = array_column($_SESSION['CARRITO'],"modelo"); 
            if(in_array($modelo,$modeloProducto)){
                ?> <script type="text/javascript"> 
                alert("Este producto ya existe en su carrito");
                window.location.href = "productos.php";</script> <?php 
            }
            else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto = array (
                    'modelo' => $modelo,
                    'nombre' => $nombre,
                    'precio' => $precio,               
                 );
                 $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                 if($_POST['add']=="tienda")
                {
                    header("Location:productos.php");
                }
                if($_POST['add']=="inicio")
                {
                    header("Location:index.php");
                }
                if($_POST['add']=="detalle")
                 {
                    header("Location:product-detail.php?id=$nombre");
                }     

            }
        }
    }
    if(isset($_POST['delete'])){
            $modelo= $_POST['modelo'];
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                if($producto['modelo']==$modelo){
                    unset($_SESSION['CARRITO'][$indice]);
                    header("Location:index.php");
                }          
            }
            header("Location:index.php");
    } 
    if(isset($_POST['deleteC'])){
        $modelo= $_POST['modelo'];
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            if($producto['modelo']==$modelo){
                unset($_SESSION['CARRITO'][$indice]);
                header("Location:index.php");
            }          
        }
        header("Location:carrito.php");
    }
    if(isset($_POST['deleteP'])){
        $modelo= $_POST['modelo'];
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            if($producto['modelo']==$modelo){
                unset($_SESSION['CARRITO'][$indice]);
                header("Location:index.php");
            }          
        }
        header("Location:productos.php");
    }
                      

    
    
    
    /*else if(isset($_POST['add2'])){
        $modelo = $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        if(!isset($_SESSION['CARRITO'])){
            $producto = array (
                'modelo' => $modelo,
                'nombre' => $nombre,
                'precio' => $precio,               
             );
             $_SESSION['CARRITO'][0]=$producto;
             header("Location:productos.php");
        }
        else
        {
            $modeloProducto = array_column($_SESSION['CARRITO'],"modelo"); 
            if(in_array($modelo,$modeloProducto)){
                echo '<script> alert("Este producto ya existe en tu carrito!");</script>';
                header("Location:productos.php");
            }
            else
            {
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto = array (
                    'modelo' => $modelo,
                    'nombre' => $nombre,
                    'precio' => $precio,               
                 );
                 $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                 header("Location:productos.php");
            }
        }*/

    
?>