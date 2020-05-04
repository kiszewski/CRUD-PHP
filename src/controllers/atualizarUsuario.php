<?php
$usuarios = User::buscarTodosUsuarios();
carregarUsuarios('app', $usuarios);

if (isset($_GET['userId']) && count($_POST) == 0) {
    $id = $_GET['userId'];
    $usuario = User::buscarUsuarioPorId($id);

    carregarView('formulario', ['user' => $usuario]);
} elseif (count($_POST) > 0) {
    $erros = validarFormulario($_POST);
    $dados = $_POST;
    
    if (count($erros) === 0) {
        $user = new User($dados);
        $user->atualizar();
        $_POST = [];
        header('Location: users.php');
    } else {
        carregarView('formulario', ['user' => $dados, 'erros' => $erros]);
    }
}
