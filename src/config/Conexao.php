<?php

class Conexao {
    private static $instance = null;
    private $conn;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "saperbackendtest_agenda";

    private function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        }

        // Cria o banco de dados se não existir
        $this->createDatabase();

        // Conecta ao banco de dados
        $this->conn->select_db($this->database);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    private function createDatabase() {
        $sql = "CREATE DATABASE IF NOT EXISTS $this->database";
        if ($this->conn->query($sql) === FALSE) {
            die("Erro ao criar banco de dados: " . $this->conn->error);
        }
    }

    public function createTable($tableName, $columns) {
        $sql = "CREATE TABLE IF NOT EXISTS $tableName (";
        $sql .= "id INT AUTO_INCREMENT PRIMARY KEY, "; // Adiciona a coluna id como primary key com auto incremento

        foreach ($columns as $columnName => $columnType) {
            $sql .= "$columnName $columnType, ";
        }
        $sql = rtrim($sql, ", "); // Remove a última vírgula e espaço
        $sql .= ")";

        if ($this->conn->query($sql) === FALSE) {
            die("Erro ao criar tabela: " . $this->conn->error);
        }
    }
}

// Exemplo de uso:
$columns = [
    'nome' => 'VARCHAR(255)',
    'email' => 'VARCHAR(255)',
    'data_nascimento' => 'DATE',
    'cpf' => 'VARCHAR(14)',
    'telefones' => 'VARCHAR(255)'
];

$conexao = Conexao::getInstance();
$conexao->createTable('contatos', $columns);
