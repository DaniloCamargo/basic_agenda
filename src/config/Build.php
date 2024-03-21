<?php

require_once './src/config/Conexao.php';

class Build {
  public static function run() {
    // Define a estrutura das tabelas
    $contatosColumns = [
      'nome' => 'VARCHAR(255)',
      'email' => 'VARCHAR(255)',
      'data_nascimento' => 'DATE',
      'cpf' => 'VARCHAR(14)',
      'telefones' => 'VARCHAR(255)'
    ];

    // Cria a conexão com o banco de dados
    $conexao = Conexao::getInstance();

    // Cria a tabela de contatos
    $conexao->createTable('contatos', $contatosColumns);

    echo "Banco de dados e tabelas criados com sucesso.";
  }
}
