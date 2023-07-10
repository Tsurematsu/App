<?php
    if (isset($_POST['page'])) {
        $pagina = $_POST['page'];
        unset($_POST['page']);
        echo "<script> const \$_POST = ".json_encode($_POST)."; </script>";
        include $pagina;
    }else if (isset($_GET['page'])){
        if (!empty($_POST)) {
            // $_POST contiene al menos un valor
            echo "<script> const \$_POST = ".json_encode($_POST)."; </script>";
        }
        include 'frontend/' . $_GET['page'] . '.html';
    }else{
        include 'frontEnd/home.html';
    }
    
?>

