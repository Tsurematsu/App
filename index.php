
<?php
    require 'Methods/Database.php'; // Se importa el archivo que contiene la lógica de conexión a la base de datos
    
    if (isset($_POST['page'])) {
        // Si se ha enviado una variable 'page' a través del método POST
        $pagina = $_POST['page']; // Se obtiene el valor de 'page'
        unset($_POST['page']); // Se elimina 'page' del arreglo $_POST

        // Se crea una variable JavaScript \$_POST que contiene los datos de $_POST codificados como JSON
        echo "<script> const \$_POST = " . json_encode($_POST) . "; </script>";

        include $pagina; // Se incluye la página especificada por 'page'
    } else if (isset($_GET['page'])) {
        // Si se ha enviado una variable 'page' a través del método GET
        if (!empty($_POST)) {
            // Si $_POST contiene al menos un valor
            echo "<script> const \$_POST = " . json_encode($_POST) . "; </script>";
        }
        
        // Se incluye la página especificada por 'page' dentro del directorio 'frontend'
        include 'frontend/' . $_GET['page'] . '.html';
    } else {
        // Si no se ha enviado ni 'page' por POST ni por GET, se incluye la página 'home.html' dentro del directorio 'frontEnd'
        $consulta_categorias = query("SELECT * FROM categorias");
        $consulta_elementos = query("SELECT * FROM elementos");
        echo "<script> const \$_categorias = " . json_encode($consulta_categorias) . "; </script>";
        echo "<script> const \$_elementos = " . json_encode($consulta_elementos) . "; </script>";

        include 'frontEnd/home.html';
    }
?>

<!-- La primera condición verifica si se ha enviado la variable 'page' a través del método POST. Si es así, se obtiene el valor de 'page' 
y se elimina del arreglo $_POST. Luego se crea una variable JavaScript $_POST que contiene los datos de $_POST codificados como JSON. Finalmente, 
se incluye la página especificada por 'page'.

La segunda condición verifica si se ha enviado la variable 'page' a través del método GET. 
Si es así, se verifica si $_POST contiene al menos un valor. Si lo tiene, se crea una variable JavaScript 
$_POST con los datos de $_POST codificados como JSON. Luego se incluye la página especificada por 'page' dentro del 
directorio 'frontend'.

Si no se cumple ninguna de las condiciones anteriores, se incluye la página 'home.html' dentro del directorio 
'frontEnd'. -->

<!-- <a href="https://www.flaticon.es/iconos-gratis/raza" title="raza iconos">Raza iconos creados por Darius Dan - Flaticon</a> -->