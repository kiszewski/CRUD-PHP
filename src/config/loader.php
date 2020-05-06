<?php

// function carregarUsuarios($view, $params = []) {
//     $usuarios = [];
//     if(count($params) > 0) {
//         foreach($params as $chave => $valor) {
//             $usuarios[$chave] = $valor;
//         }
//     }

//     require_once(realpath(VIEWS_PATH . "/$view.php"));
// }

function carregarView($view, $params = []) {
    if(count($params) > 0) {
        foreach($params as $chave => $valor) {
            if(is_array($chave)) {
                foreach($chave as $chaveB => $valorB) {
                    $usuarios[$chaveB] = $valorB;
                }
            }

            if(strlen($chave) > 0) {
                ${$chave} = $valor;
            }
        }
    }

    require_once(realpath(VIEWS_PATH . "/header.php"));
    require_once(realpath(VIEWS_PATH . "/$view.php"));
    require_once(realpath(VIEWS_PATH . "/footer.php"));
}