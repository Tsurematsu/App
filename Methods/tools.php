

<?php
    function Redirection($action, $variables) : void {
        $html = '<form style="display: none;" id="redirectForm" method="post" action="'.$action.'">';
        for ($i=0; $i < count($variables); $i++) {
            $html .= '<input name="' .$variables[$i][0] .'" value="' . $variables[$i][1] . '">';
        }
        $html .= '</form>';
        $html .= '<script>document.getElementById("redirectForm").submit();</script>';
        echo $html;
    }

    function Generar_insert($POST_V, $tabla)  {
        $sql = "INSERT INTO $tabla (%val_A%) VALUES (%val_B%);";
        $fragmento1="";
        $fragmento2="";
        foreach ($POST_V as $clave => $valor) {
            $fragmento1 .= $clave . ", ";
            $fragmento2 .= "\'" . $valor . "\'";
        }
    }
?>