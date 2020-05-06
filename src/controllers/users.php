<?php
$qtdUsuarios = User::getCount();
$numPages = ceil($qtdUsuarios / 5);

if(isset($_GET['page'])) {
    $usuarios = User::buscarUsuariosPorPagina($_GET['page']);
    carregarView('users',  [
        'usuarios' => $usuarios,
        'qtdUsuarios' => $qtdUsuarios,
        'numPages' => $numPages,
        'pageAtual' => $_GET['page']
    ]); 
} else {
    $usuarios = User::buscarUsuariosPorPagina(1);
    carregarView('users',  [
        'usuarios' => $usuarios,
        'qtdUsuarios' => $qtdUsuarios,
        'numPages' => $numPages,
        'pageAtual' => 1
    ]); 
}