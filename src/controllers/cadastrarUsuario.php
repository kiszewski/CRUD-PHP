<?php
$usuarios = User::buscarTodosUsuarios();
carregarUsuarios('app', $usuarios);

if(isset($_POST['first'])) {
    carregarView('formulario');
}

if (count($_POST) > 0) {
    $erros = validarFormulario($_POST);   
    $dados = $_POST;

    if(count($erros) === 0) {
        $user = new User($dados);
        $user->incluir();
        $_POST = [];
        header('Location: users.php');
    } else {
        carregarView('formulario', ['user' => $dados, 'erros' => $erros]);
    }
}