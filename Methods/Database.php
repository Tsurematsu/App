<?php 
    function conectarBD($nombreBD) {
        // Configuración de conexión a la base de datos
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
    
        // Crear la conexión utilizando la configuración especificada
        $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
    
        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error al conectar a la base de datos: " . $conexion->connect_error);
        }
    
        // Establecer el juego de caracteres a UTF-8
        $conexion->set_charset("utf8");
    
        return $conexion; // Devolver la conexión establecida
    }

    function convertirResultadoEnArray($resultado) {
        $arrayResultado = array();
        if ($resultado->num_rows > 0) {
            // Iterar sobre cada fila del resultado y agregarla al array
            while ($fila = $resultado->fetch_assoc()) {
                $arrayResultado[] = $fila;
            }
        }
        return $arrayResultado; // Devolver el array con los resultados
    }
    
    function query($sql) {
        $conexion = conectarBD("app"); // Establecer conexión a la base de datos
        $resultado = $conexion->query($sql); // Ejecutar la consulta SQL
        $arrayResultado = convertirResultadoEnArray($resultado); // Convertir el resultado en un array
        $conexion->close(); // Cerrar la conexión a la base de datos
        return $arrayResultado; // Devolver el array con los resultados
    }

    function add_query($sql) {
        $conexion = conectarBD("app"); // Establecer conexión a la base de datos
        $resultado = $conexion->query($sql); // Ejecutar la consulta SQL
        $conexion->close(); // Cerrar la conexión a la base de datos
    
        // Verificar si la operación fue exitosa
        if ($resultado === TRUE) {
            return true;
        } else {
            return false;
        }
    }
?>
