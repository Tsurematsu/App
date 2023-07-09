

<?php
    function Redireccion($action, $variables) : void {
        $html = '<form style="display: block;" id="redirectForm" method="post" action="'.$action.'">';
        for ($i=0; $i < count($variables); $i++) {
            $html .= '<input name="' .$variables[$i][0] .'" value="' . $variables[$i][1] . '">';
        }
        // $html .= '<button>ingresar</button>';
        $html .= '</form>';
        // Agregar un script para enviar automáticamente el formulario al cargar la página
        $html .= '<script>document.getElementById("redirectForm").submit();</script>';
        echo $html;
    }
?>