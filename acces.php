<?php
    include 'agregarCarrito.php';
    $servicio = new SoapClient('http://interfacesavanzadasP.somee.com/Service1.svc?singleWsdl');
    if(isset($_POST['login-submit'])){    
        $correo=$_POST['username'];;
        $password=$_POST['password'];     
        $parametros = array('correo'=>$correo,'contrasena'=>$password);
        $resultado = $servicio -> VerificarLogin($parametros);
        foreach ($resultado as $obj => $value) {
            if($value==1){
                $usuario = array ('USUARIO' => $correo,);
                $_SESSION['USUARIO'][0]=$usuario;
                header('Location: pago.php');  
            }     
            else
             header("Location:login.php");
        }
    }else{
        header("Location:login.php");
    }
?>