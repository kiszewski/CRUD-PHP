<?php
$usuarios = User::buscarTodosUsuarios();
carregarUsuarios('app', $usuarios); 