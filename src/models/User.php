<?php

class User
{
    public $dados = [
        'nome' => '',
        'telefone' => '',
        'email' => '',
        'data_nascimento' => '',
        'salario' => '',
        'cidade' => ''
    ];

    public function __construct($arr = [])
    {
        if (count($arr) > 0) {
            foreach ($arr as $chave => $valor) {
                $this->$chave = $valor;
            }
        }
    }

    public function __set($chave, $valor)
    {
        $this->dados[$chave] = $valor;
    }

    public function __get($chave)
    {
        return $this->dados[$chave];
    }

    public static function buscarTodosUsuarios()
    {
        $registros = [];
        $sql = "SELECT * FROM usuarios";
        $resultado = Database::enviarQuery($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }
        }
        return $registros;
    }
 
    public static function getCount() {
        $sql = "SELECT COUNT(id) as 'count' FROM usuarios";
        $resultado = Database::enviarQuery($sql);
        return $resultado->fetch_assoc()['count'];
    }

    public static function buscarUsuariosPorPagina($pagina, $limit = 5) {
        if($pagina !== 1) {
            $offset = ($pagina * $limit) - $limit;
        }

        $sql = $pagina === 1 ? "SELECT * FROM usuarios LIMIT $limit" : 
        "SELECT * FROM usuarios LIMIT {$limit} OFFSET {$offset}";

        $resultado = Database::enviarQuery($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $registros[] = $row;
            }
        }
        return $registros;
    }

    public static function buscarUsuarioPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = $id";

        $resultado = Database::enviarQuery($sql);

        if($resultado) {
            return $resultado->fetch_assoc();
        } else {
            return 'Id nao encotrado!';
        }
    } 

    public function incluir()
    {
        $conexao = Database::conectarBanco();
        $sql = "INSERT INTO usuarios (nome, telefone, email, data_nascimento, salario, cidade)
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $parametros = static::obterValores($this->dados);
        $stmt->bind_param('ssssds', ...$parametros);

        if ($stmt->execute()) {
            $this->id = $stmt->insert_id;
            return $stmt;
        } else {
            return $stmt->error;
        }
    }

    public function atualizar()
    {
        $sql = "UPDATE usuarios SET ";

        foreach($this->dados as $chave => $valor) {
            if($chave !== 'id') {
                $sql .= "$chave = " . static::getFormatedValue($valor) . ", ";
            } else {
                $id = $valor;
            }
        }

        $sql[strlen($sql) - 2] = ' ';
        $sql .= "WHERE id = $id";

        $resultado = Database::enviarQuery($sql);

        if($resultado) {
            return $resultado;
        } else {
            return $sql;
        }
    }

    public function deletar($id) {
        $sql = "DELETE FROM usuarios WHERE id = {$id}";
        $resultado = Database::enviarQuery($sql);

        if($resultado) {
            return $resultado;
        } else {
            return $sql;
        }
    }

    private static function obterValores($usuarios = [])
    {
        $valores = [];
        foreach ($usuarios as $valor) {
            if (is_string($valor)) {
                $valores[] = "$valor";
            } else {
                $valores[] = $valor;
            }
        }
        return $valores;
    }

    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(is_string($value)) {
            return "'$value'";
        } else {
            return $value;
        }
    }
}
