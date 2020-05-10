<main>
    <header class="header p-2">
        <a class="btn btn-lg btn-p" href="cadastrarUsuario.php">Novo Usuário</a>
    </header>
    <table class="table table-dark mb-0">
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
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger" href="deletarUsuario.php?userId=<?= $usuario['id'] ?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <nav class="mt-3" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $pageAtual == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="users.php?page=<?= $pageAtual - 1 ?>">Anterior</a>
            </li>
            <?php for($page = 1; $page <= $numPages; $page++): ?>
                <li class="page-item <?= $page == $pageAtual ? 'active' : '' ?>">
                    <a class="page-link" href="users.php?page=<?= $page ?>">
                        <?= $page ?>
                    </a>
                </li>
            <?php endfor ?>
            <li class="page-item <?= $pageAtual == $numPages ? 'disabled' : '' ?>">
                <a class="page-link" href="users.php?page=<?= $pageAtual + 1 ?>">Próximo</a>
            </li>
        </ul>
    </nav>
</main>