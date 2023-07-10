<?php 
    if (isset($_POST['tipo_consulta'])) {
        $consult = $_POST['tipo_consulta']; // Se obtiene el valor de 'consulta'

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
        
    }

    function read_product() {
        
    }

    function update_product() {
        
    }

    function delete_product(){
        
    }

?>