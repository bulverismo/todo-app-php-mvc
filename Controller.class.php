<?php
class Controller{
    public function view($arquivo, $dados = null){
    if (!is_null($dados)) {
        foreach ($dados as $var => $value) {
            ${$var} = $value;
        }
    }
    include "{$arquivo}.view.php";
    }
}
?>