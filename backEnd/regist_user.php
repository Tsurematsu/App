<?php 
    require '../Methods/Database.php'; // Se importa el archivo que contiene la lógica de conexión a la base de datos
    include '../Methods/tools.php'; // Se importa el archivo con funciones auxiliares

    $verify = [
        (isset($_POST['email'])), // Se verifica si el campo 'email' está definido en $_POST
        (isset($_POST['nombre'])), // Se verifica si el campo 'nombre' está definido en $_POST
        (isset($_POST['usuario'])), // Se verifica si el campo 'usuario' está definido en $_POST
        (isset($_POST['password'])), // Se verifica si el campo 'password' está definido en $_POST
    ];

    $Already=true; // Variable de control para determinar si todos los campos están definidos

    for ($i=0; $i < count($verify); $i++) { 
        if ($verify==false) { // Si uno de los campos no está definido, se actualiza la variable $Already a false
            $Already=false;
        }
    }

    if ($Already) { // Si todos los campos están definidos
        $username_BD = query("SELECT nombre FROM usuarios WHERE usuario=". "'" . $_POST['usuario'] . "'"); // Se realiza una consulta para verificar si el usuario ya existe en la base de datos

        if (count($username_BD)<=0) { // Si no se encontró ningún usuario con el mismo nombre en la base de datos
            $tipo_usuario="client"; // Se define el tipo de usuario como "client"

            // Se construye la consulta SQL para insertar los datos en la tabla 'usuarios'
            $sql = "INSERT INTO usuarios (email, nombre, usuario, password, observaciones) VALUES (
                '" . $_POST['email'] . "', 
                '" . $_POST['nombre'] . "', 
                '" . $_POST['usuario'] . "', 
                '" . $_POST['password'] . "', 
                '" . $tipo_usuario . "'
            )";

            if (add_query($sql)) { // Se ejecuta la consulta para agregar el nuevo usuario a la base de datos
                Redirection("../", [ // Redirecciona al directorio principal con algunos parámetros de redirección
                    ['page', 'frontEnd/welcome.html'],
                    ['username', $_POST['usuario']]
                ]);
            } else {
                echo "Error, la consulta no pudo realizarse, verifica la conexión a la base de datos"; // Mensaje de error en caso de que la consulta no se haya ejecutado correctamente
            }
        } else {
            Redirection("../?page=regist", [ // Redirecciona a la página de registro con un mensaje indicando que el usuario ya existe
                ['msg', 'El usuario ya existe'],
            ]);
        }
    }
?>
