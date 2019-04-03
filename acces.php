<?php
    include 'agregarCarrito.php';
    $servicio = new SoapClient('http://interfacesavanzadasp.somee.com/Service1.svc?wsdl');
    $registro = 0;
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
        $parametros = array('id_cliente'=>$id_cliente,'nombre'=>$nombre,'apellidos'=>$apellidos, 'correo' => $correo,'telefono'=> $telefono,'codigo_postal'=>$codigo_postal,'estado'=>$estado,'ciudad'=>$ciudad,'colonia'=>$colonia,'calle'=>$calle,'contrasena'=>$contrasena);
        $respuesta = $servicio -> AgregarCliente($parametros);
        if($respuesta==1){
            $registro = 1;
        }
    }
    if(isset($_POST['login-submit'])){    
        $correo=$_POST['username'];
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