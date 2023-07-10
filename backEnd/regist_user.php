<?php 
    require '../Methods/Database.php';
    include '../Methods/tools.php';
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
        $username_BD = query("SELECT nombre FROM usuarios WHERE usuario=". "'" . $_POST['usuario'] . "'");
        if (count($username_BD)<=0) {
            $tipo_usuario="client";
            $sql = "INSERT INTO usuarios (email, nombre, usuario, password, observaciones) VALUES (
                '" . $_POST['email'] . "', 
                '" . $_POST['nombre'] . "', 
                '" . $_POST['usuario'] . "', 
                '" . $_POST['password'] . "', 
                '" . $tipo_usuario . "'
            )";
            if (add_query($sql)) {
                Redirection("../", [
                    ['page', 'frontEnd/welcome.html'],
                    ['username', $_POST['usuario']]
                ]);
            }else{
                echo "Error, la consulta no puedo realizarse,  verifica la conexión a la DataBase";
            }
        }else{
            header('Location: /App?page=regist');
        }
    }

?>