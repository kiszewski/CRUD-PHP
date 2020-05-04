<?php 

function validarFormulario($post) {
    $erros = [];
    if ($post['nome'] === '') {
        $erros['nome'] = 'Nome inválido';
    }

    if (strlen($post['telefone']) != 11) {
        $erros['telefone'] = 'Quantidade de digitos errada';
    }

    if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = "E-mail inválido";
    }

    if (!$post['data_nascimento']) {
        $erros['data_nascimento'] = "Informe a data de nascimento";
    }

    if (!is_string($post['cidade'])) {
        $erros['cidade'] = "Informe uma cidade valida";
    }

    return $erros;
}