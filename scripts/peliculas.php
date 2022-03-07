<?php

    error_reporting(E_ALL ^ E_NOTICE);
    require_once 'database.php';
    header('Content-type:application/json');
    extract($_POST);

    try{
        
        $db = new Database();
        $db->conectarDB();
        
//        $accion = "seleccionar";
        
        switch($accion){               
            case "insertar":
                $db->ejecutarSQL("insert into peliculas(titulo,genero,duracion,clasificacion) values('$titulo','$genero','$duracion','$clasificacion')");
                break;
            case "actualizar":
                $db->ejecutarSQL("update peliculas set titulo = '$titulo', genero = '$genero', duracion = '$duracion', clasificacion = '$clasificacion' where idp = $idp");
                break;
            case "seleccionar":
                $video["peliculas"] = $db->seleccionar("select * from peliculas");
                break;
            case "eliminar":
                $db->ejecutarSQL("delete from peliculas where idp = $idp");
                break;
        }
        
        echo ($video != null)? json_encode($video) : "{}";
        
        $db->desconectarDB();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
?>