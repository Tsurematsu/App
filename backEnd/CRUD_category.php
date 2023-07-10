<?php 
    require "../Methods/tools.php";
    require "../Methods/Database.php";
    
    $tabla_seleccionada = "categorias";
    if (isset($_GET['tipo_consulta'])) {
        $consult = $_GET['tipo_consulta']; // Se obtiene el valor de 'consulta'

        if ($consult == "create") {
            echo json_encode(create_category());
        }

        if ($consult == "read") {
            echo json_encode(read_category());
        }
        
        if ($consult == "update") {
            echo json_encode(update_category());
        }

        if ($consult == "delete") {
            echo json_encode(delete_category());
        }
        

    }


    function create_category() {
        global $tabla_seleccionada;
        $sql = Generar_insert($_POST, $tabla_seleccionada);
        return  add_query($sql);
    }

    function read_category() {
        global $tabla_seleccionada;
        $sql = "SELECT * FROM $tabla_seleccionada";
        return query($sql);
    }

    function update_category() {
        
    }

    function delete_category(){
        
    }

?>