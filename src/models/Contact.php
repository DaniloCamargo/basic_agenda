<?php

class Contact {
  public $id;
  public $nome;
  public $email;
  public $data_nascimento;
  public $cpf;
  public $telefones;

  public function __construct($nome, $email, $data_nascimento, $cpf, $telefones) {
    $dataFormatada = ($data_nascimento != '') ? date('Y-m-d', strtotime($data_nascimento)) : null;
    $this->nome = $nome;
    $this->email = $email;
    $this->data_nascimento = $dataFormatada;
    $this->cpf = $cpf;
    $this->telefones = $telefones;
  }
}
