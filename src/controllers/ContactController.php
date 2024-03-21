<?php

require_once './src/models/Contact.php';
require_once './src/config/Conexao.php';

class ContactController {
    private $conn;

    public function __construct() {
      $conexao = Conexao::getInstance();
      $this->conn = $conexao->getConnection();
    }

    // Método para adicionar um novo contato ao banco de dados
    public function addContact($contact) {
      $nome = $contact->nome;
      $email = $contact->email;
      $dataNascimento = $contact->dataNascimento;
      $cpf = $contact->cpf;
      $telefones = $contact->telefones;

      $sql = "INSERT INTO contatos (nome, email, data_nascimento, cpf, telefones) VALUES ('$nome', '$email', '$dataNascimento', '$cpf', '$telefones')";

      if ($this->conn->query($sql) === TRUE) {
        return true;
      } else {
        return false;
      }
    }

    // Método para editar um contato existente no banco de dados
    public function editContact($id, $newContact) {
      $nome = $newContact->nome;
      $email = $newContact->email;
      $dataNascimento = $newContact->dataNascimento;
      $cpf = $newContact->cpf;
      $telefones = $newContact->telefones;

      $sql = "UPDATE contatos SET nome='$nome', email='$email', data_nascimento='$dataNascimento', cpf='$cpf', telefones='$telefones' WHERE id=$id";

      if ($this->conn->query($sql) === TRUE) {
        return true;
      } else {
        return false;
      }
    }

    // Método para listar todos os contatos
    public function listContacts() {
      $sql = "SELECT contatos *";

      if ($this->conn->query($sql) === TRUE) {
        return true;
      } else {
        return false;
      }
    }
}