    <form action="atualizarUsuario.php" method="post" class="form">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <div class="form-row">
            <div class="title mb-2 col-md-11">Alterar Usuário</div>
            <a class="col-md-1" href="users.php">X</a>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input class="form-control <?= $erros['nome'] ? 'is-invalid' : '' ?>" type="text" name="nome" id="nome" value="<?= $user['nome'] ?>">
                <div class="invalid-feedback"><?= $erros['nome'] ?></div>
            </div>
            <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <input class="form-control <?= $erros['telefone'] ? 'is-invalid' : '' ?>" type="text" name="telefone" id="telefone" value="<?= $user['telefone'] ?>">
                <div class="invalid-feedback"><?= $erros['telefone'] ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input class="form-control <?= $erros['email'] ? 'is-invalid' : '' ?>" type="email" name="email" id="email" value="<?= $user['email'] ?>">
                <div class="invalid-feedback"><?= $erros['email'] ?></div>
            </div>
            <div class="form-group col-md-6">
                <label for="data_nascimento">Data de Nascimento</label>
                <input class="form-control <?= $erros['data_nascimento'] ? 'is-invalid' : '' ?>" type="date" name="data_nascimento" id="data_nascimento" value="<?= $user['data_nascimento'] ?>">
                <div class="invalid-feedback"><?= $erros['data_nascimento'] ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="salario">Salário</label>
                <input class="form-control <?= $erros['salario'] ? 'is-invalid' : '' ?>" type="number" name="salario" id="salario" value="<?= $user['salario'] ?>">
                <div class="invalid-feedback"><?= $erros['salario'] ?></div>
            </div>
            <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input class="form-control <?= $erros['cidade'] ? 'is-invalid' : '' ?>" type="text" name="cidade" id="cidade" value="<?= $user['cidade'] ?>">
                <div class="invalid-feedback"><?= $erros['cidade'] ?></div>
            </div>
        </div>
        <button class="btn btn-lg btn-primary">Alterar</button>
    </form>