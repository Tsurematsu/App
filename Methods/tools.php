

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
            if (!str_contains($clave, "_")) {
                if (str_contains($clave, "#")) {
                    $fragmento1 .= substr($clave, 1, strlen($clave)) . ", ";
                    $fragmento2 .= $valor . ", ";
                }else{
                    $fragmento1 .= $clave . ", ";
                    $fragmento2 .= "'" . $valor . "', ";
                }
            }
        }
        $sql = str_replace("%val_A%", substr($fragmento1, 0, strlen($fragmento1)-2), $sql);
        $sql = str_replace("%val_B%", substr($fragmento2, 0, strlen($fragmento2)-2), $sql);
        return $sql;
    }

    function Generar_update($POST_V, $tabla, $condicion)  {
        $sql = "UPDATE $tabla SET %val_A% WHERE $condicion;";
        $fragmento1="";
        foreach ($POST_V as $clave => $valor) {
            if (!str_contains($clave, "_")) {
                if (str_contains($clave, "#")) {
                    $fragmento1 .= substr($clave, 1, strlen($clave)) . " = " . $valor .  ", ";
                }else{
                    $fragmento1 .= $clave . " = '" . $valor . "', ";
                }
            }
        }
        $sql = str_replace("%val_A%", substr($fragmento1, 0, strlen($fragmento1)-2), $sql);
        return $sql;
    }
?>