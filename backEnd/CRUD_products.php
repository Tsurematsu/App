<?php 
    require "../Methods/tools.php";
    require "../Methods/Database.php";
    
    $tabla_seleccionada = "elementos";
    if (isset($_GET['tipo_consulta'])) {
        $consult = $_GET['tipo_consulta']; // Se obtiene el valor de 'consulta'

        if ($consult == "create") {
            echo json_encode(create_product());
        }

        if ($consult == "read") {
            echo json_encode(read_product());
        }
        
        if ($consult == "update") {
            echo json_encode(update_product());
        }

        if ($consult == "delete") {
            echo json_encode(delete_product());
        }
        

    }


    function create_product() {
        global $tabla_seleccionada;
        $sql = Generar_insert($_POST, $tabla_seleccionada);
        return  add_query($sql);
    }

    function read_product() {
        global $tabla_seleccionada;
        $sql = "SELECT * FROM $tabla_seleccionada";
        return query($sql);
    }

    function update_product() {
        global $tabla_seleccionada;
        $sql = Generar_update($_POST, $tabla_seleccionada, "Id_elemento='".$_POST['Id_elemento']."'");
        return  add_query($sql);
    }

    function delete_product(){
        global $tabla_seleccionada;
        $sql = "DELETE FROM $tabla_seleccionada WHERE Id_elemento = '" . $_POST['Id_elemento'] . "';";
        return  add_query($sql);
    }

?>