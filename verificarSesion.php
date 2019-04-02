<?php
    $inicio ="no";
    $usuario = "";
    if(isset($_SESSION['USUARIO'])){
        if(array_column($_SESSION['USUARIO'],"USUARIO")== null){
            
             }else{
                $email = array_column($_SESSION['USUARIO'],"USUARIO");                
                $usuario = $email[0]; 
                $inicio='si';                 
                }
    }else{
     $inicio='no';
    }        
?>