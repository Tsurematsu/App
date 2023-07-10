<?php 
    require '../Methods/Database.php';
    $verify = [
        (isset($_POST['email'])),
        (isset($_POST['nombre'])),
        (isset($_POST['usuario'])),
        (isset($_POST['password'])),
    ];
    $Already=true;
    for ($i=0; $i < count($verify); $i++) { 
        if ($verify==false) {
            $Already=false;
        }
    }
    if ($Already) {
        $conexion = conectarBD("app");
        $sql = "SELECT * FROM usuarios";
        $resultado = $conexion->query($sql);
        $arrayResultado = convertirResultadoEnArray($resultado);
        print_r($arrayResultado);
        $conexion->close();
    }

?>