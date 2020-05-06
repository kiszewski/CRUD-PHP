<?php
if (count($_POST) > 0) {
    $erros = validarFormulario($_POST);   
    $dados = $_POST;

    if($dados['id'] == '' || is_null($dados['id'])) {
        unset($dados['id']);
    }
    
    if(count($erros) === 0) {
        $user = new User($dados);
        $user->incluir();
        $_POST = [];
        header('Location: users.php');
    } else {
        carregarView('formulario', ['user' => $dados, 'erros' => $erros]);
    }
} else {
    carregarView('formulario');
}