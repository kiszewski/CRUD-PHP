<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>CRUD</title>
</head>

<body>
    <div class="tabela">
        <header class="header p-2">
            <a class="btn btn-lg btn-primary" href="cadastrarUsuario.php">Novo Usuário</a>
        </header>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Alterações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['telefone'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['data_nascimento'] ?></td>
                        <td><?= $usuario['salario'] ?></td>
                        <td><?= $usuario['cidade'] ?></td>
                        <td>
                            <a class="btn btn-warning" href="atualizarUsuario.php?userId=<?= $usuario['id'] ?>">
                                <i class="icofont-pencil"></i>
                            </a>
                            <a class="btn btn-danger" href="deletarUsuario.php?userId=<?= $usuario['id'] ?>">
                                <i class="icofont-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>