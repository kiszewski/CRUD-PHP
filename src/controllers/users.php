<?php
$qtdUsuarios = User::getCount();
$numPages = ceil($qtdUsuarios / 5);

if(isset($_GET['page'])) {
    $usuarios = User::buscarUsuariosPorPagina($_GET['page']);
    foreach($usuarios as $index => $user) {
        $usuarios[$index]['data_nascimento'] = parseDateToString($user['data_nascimento']);
        $usuarios[$index]['salario'] = formatSalary($user['salario']);
        $usuarios[$index]['telefone'] = formatPhone($user['telefone']);
    }
    carregarView('users',  [
        'usuarios' => $usuarios,
        'qtdUsuarios' => $qtdUsuarios,
        'numPages' => $numPages,
        'pageAtual' => $_GET['page']
    ]); 
} else {
    $usuarios = User::buscarUsuariosPorPagina(1);
    foreach($usuarios as $index => $user) {
        $usuarios[$index]['data_nascimento'] = parseDateToString($user['data_nascimento']);
        $usuarios[$index]['salario'] = formatSalary($user['salario']);
        $usuarios[$index]['telefone'] = formatPhone($user['telefone']);
    }
    carregarView('users',  [
        'usuarios' => $usuarios,
        'qtdUsuarios' => $qtdUsuarios,
        'numPages' => $numPages,
        'pageAtual' => 1
    ]); 
}