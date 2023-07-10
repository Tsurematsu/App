<?php 
    require "../Methods/tools.php";
    require "../Methods/Database.php";
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
        $sql = Generar_insert($_POST, "categorias");
        return  add_query($sql);
    }

    function read_category() {
        
    }

    function update_category() {
        
    }

    function delete_category(){
        
    }

?>