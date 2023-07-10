<?php 
    function conectarBD($nombreBD) {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
    
        // Crear la conexión
        $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
    
        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $conexion->connect_error);
        }
    
        // Establecer el juego de caracteres
        $conexion->set_charset("utf8");
    
        return $conexion;
    }
    
    function convertirResultadoEnArray($resultado) {
        $arrayResultado = array();
    
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $arrayResultado[] = $fila;
            }
        }
    
        return $arrayResultado;
    }
    
?>