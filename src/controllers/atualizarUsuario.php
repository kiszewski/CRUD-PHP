<?php
$usuarios = User::buscarTodosUsuarios();
carregarUsuarios('app', $usuarios);

if (isset($_GET['userId'])) {
    $id = $_GET['userId'];
    $usuario = User::buscarUsuarioPorId($id);

    carregarView('formularioAlterar', ['user' => $usuario]);
} else {
    if (count($_POST) > 0) {
        $erros = validarFormulario($_POST);   
        $dados = $_POST;
        
        if (count($erros) === 0) {
            $user = new User($dados);
            $resultado = $user->atualizar();
            $_POST = [];
            header('Location: users.php');
        } else {
            carregarView('formularioAlterar', ['user' => $dados, 'erros' => $erros]);
        }
    }
}
