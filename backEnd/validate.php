<?php
    require '../Methods/tools.php';
    require '../Methods/Database.php';
    // Verificar si se han enviado los datos de inicio de sesión
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los valores ingresados por el usuario
        $usuario = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT nombre FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
        if (count(query($sql))>0) {
            // Las credenciales son correctas, redirection a la página de inicio
            Redirection("../", [
                ['page', 'frontEnd/welcome.html'],
                ['username', $usuario]
            ]);
        } else {
            //si las credenciales son incorrectas, redireccionar a la página de login
            header('Location: /App?page=login');
        }

    }
?>