<?php
    if (isset($_POST['page'])) {
        $pagina = $_POST['page'];
        unset($_POST['page']);
        echo "<div display=\"none\"><script> const \$_POST = ".json_encode($_POST)."; </script></div>";
        include $pagina;
    }else if (isset($_GET['page'])){
        
        include 'frontend/' . $_GET['page'] . '.html';
    }else{
        include 'frontEnd/home.html';
    }
    
?>

