<?php
    require '../Methods/tools.php';
    require '../Methods/Database.php';
    // Verificar si se han enviado los datos de inicio de sesión
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los valores ingresados por el usuario
        $usuario = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT observaciones FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
        $retorno = query($sql);
        if (count($retorno)>0) {
            $ruta = "frontEnd/welcome.html";
            if ($retorno[0]['observaciones']=="admin") {
                $ruta = "frontEnd/admin.html";
            }
            // Las credenciales son correctas, redirection a la página de inicio
            Redirection("../", [
                ['page', $ruta],
                ['username', $usuario]
            ]);
        } else {
            //si las credenciales son incorrectas, redireccionar a la página de login
            Redirection("../?page=login", [
                ['msg', 'usuario o contraseña incorrecta'],
            ]);
        }

    }
?>