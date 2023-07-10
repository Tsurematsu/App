<?php
    require '../Methods/tools.php';
    // Verificar si se han enviado los datos de inicio de sesión
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los valores ingresados por el usuario
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verificar las credenciales (aquí debes implementar tu lógica de autenticación)
        if ($username == 'usuario' && $password == 'contraseña') {
            // Las credenciales son correctas, redireccionar a la página de inicio
            echo "correcto";
            Redireccion("/App", [
                ['page', 'frontEnd/welcome.html'],
                ['username', $_POST['username']]
            ]);
            // exit();
        } else {
            //si las credenciales son incorrectas, redireccionar a la página de login
            header('Location: /App?page=login');
            echo "incorrecto";
            // exit();
        }

    }
?>