<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
    include 'agregarCarrito.php';
    $servicio = new SoapClient('http://interfacesavanzadasp.somee.com/Service1.svc?singleWsdl');
   
    $registro = 0;
    $id_compra = 0;
    $id_cliente =0;
    $direccion_envio="5 Oriente";
    $total=0;
    $pago_realizado=0;
    if(isset($_POST['register-submit'])){
        $id_cliente = rand(100000, 999999);  
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos']; 
        $correo = $_POST['email'];
        $telefono=$_POST['telefono'];     
        $codigo_postal=$_POST['cp'];
        $estado=$_POST['estado'];  
        $ciudad=$_POST['ciudad']; 
        $colonia=$_POST['colonia']; 
        $calle=$_POST['calle'];
        $contrasena=$_POST['password'];
        $direccion_envio = ' '.$calle.' '.$colonia.' '.$ciudad.' '.$estado.' '.$codigo_postal; 
        $parametros = array('id_cliente'=>$id_cliente,'nombre'=>$nombre,'apellidos'=>$apellidos, 'correo' => $correo,'telefono'=> $telefono,'codigo_postal'=>$codigo_postal,'estado'=>$estado,'ciudad'=>$ciudad,'colonia'=>$colonia,'calle'=>$calle,'contrasena'=>$contrasena);
        $respuesta = $servicio -> AgregarCliente($parametros);
        if($respuesta==1){
            $registro = 1;
            ?>
            <script>
            swal({
                title: "Registro Exitoso",
                text: "Proceda a Iniciar Sesión",
                icon: "success",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location.href = 'login.php';
                } else {
                    window.location.href = 'index.php';
                }
                });
            </script>
            <?php  
        }else{
            ?>
                <script>
                swal({
                    title: "Ocurrio un error al registrarse",
                    text: "Vuelva a intentarlo",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = 'login.php';
                    } else {
                        window.location.href = 'index.php';
                    }
                    });
                </script>
                <?php 
        }
    }
    else if(isset($_POST['login-submit'])){    
        $correo=$_POST['username'];
        $password=$_POST['password'];     
        $parametros = array('correo'=>$correo,'contrasena'=>$password);
        $resultado = $servicio -> VerificarLogin($parametros);
        foreach ($resultado as $obj => $value) {
            if($value==1){              
                
                ?>
                <script>
                swal({
                    title: "BIENVENIDO",
                    text: "PROCEDA A PAGAR SUS PRUDUCTOS",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        <?php
                            $usuario = array ('USUARIO' => $correo,);
                            $_SESSION['USUARIO'][0]=$usuario; ?>
                        window.location.href = 'pago.php';
                    } else {
                        <?php
                            $usuario = array ('USUARIO' => $correo,);
                            $_SESSION['USUARIO'][0]=$usuario; ?>
                        window.location.href = 'index.php';
                    }
                    });
                </script>
                <?php 
                
                                 
            }     
            else
             {
                ?>
                <script>
                swal({
                    title: "Usuario o contraseña incorrectos",
                    text: "Vuelva a intentarlo",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = 'login.php';
                    } else {
                        window.location.href = 'index.php';
                    }
                    });
                </script>
                <?php 
             }
        }
    }else if(isset($_POST['pagar'])){
        $id_compra = rand(1,10000);
        $fecha_actual=date("d/m/Y");
        $costo_envio = 0;
        $correo="";
        if(!empty($_SESSION['CARRITO'])) {
            foreach($_SESSION['CARRITO'] as $indice=>$producto){	
                $total = $total + ($producto['precio']);
        }
        if(isset($_SESSION['USUARIO'])){
            if(array_column($_SESSION['USUARIO'],"USUARIO")== null){
                
                 }else{
                    $email = array_column($_SESSION['USUARIO'],"USUARIO");                
                    $correo = $email[0];                 
                    }
        }       
        $parametrosc=array('correo'=>$correo);
        $id_cliente= $servicio -> GetClave($parametrosc);
        $parametros=array('id_compra'=>$id_compra,'id_cliente'=>$id_cliente,'fecha'=>$fecha_actual,'precio_total'=>$total,'direccion_entrega'=>$direccion_envio,'costo_envio'=>$costo_envio);
        $response = $servicio -> AgregarCompra($parametros);
            if($response==1){
                if(!empty($_SESSION['CARRITO'])) {
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){	
                        $id_producto=$producto['modelo'];
                        $precio=$producto['precio'];
                        $parametros=array('id_compra'=>$id_compra,'id_producto'=>$id_producto,'precio'=>$precio,'cantidad'=>1);
                        $respuestaa = $servicio -> AñadirDetalleCompra($parametros);
                        if($respuestaa==1){
                            $pago_realizado=1;                     
                        }
                    }
                }
            }
        }
        if($pago_realizado==1){
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                unset($_SESSION['CARRITO'][$indice]);
            }
            header("Location:compraRealizada.php");
        }  
    }
  
?>
</body>
</html>
