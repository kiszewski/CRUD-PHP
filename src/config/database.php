<?php
class Database {

    public static function conectarBanco() {
        $envCaminho = realpath(dirname(__FILE__) . "/../../env.ini");
        $env = parse_ini_file($envCaminho);
        $conexao = new mysqli($env['servidor'], $env['usuario'], $env['senha'], $env['banco']);

        if (!$conexao->connect_error) {
            return $conexao;
        } else {
            die('Error' . $conexao->connect_error);
        }
    }

    public static function enviarQuery($sql) {
        $conexao = self::conectarBanco();
        $resultado = $conexao->query($sql);
        $conexao->close();
        
        return $resultado;
    }
}
