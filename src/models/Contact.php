<?php

class Contact {
  public $id;
  public $nome;
  public $email;
  public $dataNascimento;
  public $cpf;
  public $telefones;

  public function __construct($nome, $email, $dataNascimento, $cpf, $telefones) {
    $this->nome = $nome;
    $this->email = $email;
    $this->dataNascimento = $dataNascimento;
    $this->cpf = $cpf;
    $this->telefones = $telefones;
  }
}
