<?php

function carregarUsuarios($view, $params = []) {
    $usuarios = [];
    if(count($params) > 0) {
        foreach($params as $chave => $valor) {
            $usuarios[$chave] = $valor;
        }
    }

    require_once(realpath(VIEWS_PATH . "/$view.php"));
}

function carregarView($view, $params = []) {
    if(count($params) > 0) {
        foreach($params as $chave => $valor) {
            if(strlen($chave) > 0) {
                ${$chave} = $valor;
            }
        }
    }

    require_once(realpath(VIEWS_PATH . "/$view.php"));
}