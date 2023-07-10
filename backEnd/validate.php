<?php
    require '../Methods/tools.php'; // Se importa el archivo con funciones auxiliares
    require '../Methods/Database.php'; // Se importa el archivo que contiene la lógica de conexión a la base de datos

    // Verificar si se han enviado los datos de inicio de sesión
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los valores ingresados por el usuario
        $usuario = $_POST['username'];
        $password = $_POST['password'];

        // Construir la consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT observaciones FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
        
        // Ejecutar la consulta para obtener el resultado
        $retorno = query($sql);

        if (count($retorno)>0) { // Si se encontraron registros coincidentes
            $ruta = "frontEnd/user.html"; // Ruta predeterminada para redireccionar al usuario

            if ($retorno[0]['observaciones']=="admin") { // Si el usuario es administrador
                $ruta = "frontEnd/admin.html"; // Se actualiza la ruta de redirección a la página de administrador
            }

            // Las credenciales son correctas, redirección a la página de inicio
            Redirection("../", [
                ['page', $ruta],
                ['username', $usuario]
            ]);
        } else {
            // Las credenciales son incorrectas, redirección a la página de login con un mensaje de error
            Redirection("../?page=login", [
                ['msg', 'usuario o contraseña incorrecta'],
            ]);
        }
    }
?>
