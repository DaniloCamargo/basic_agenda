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
      $dataFormatada = ($newContact->data_nascimento != '') ? date('Y-m-d', strtotime($newContact->data_nascimento)) : null;
      $nome = $newContact->nome;
      $email = $newContact->email;
      $data_nascimento = $dataFormatada;
      $cpf = $newContact->cpf;
      $telefones = $newContact->telefones;

      $sql = "UPDATE contatos SET nome='$nome', email='$email', data_nascimento='$data_nascimento', cpf='$cpf', telefones='$telefones' WHERE id=$id";

      if ($this->conn->query($sql) === TRUE) {
        return true;
      } else {
        return false;
      }
    }

    // Método para listar todos os contatos
    public function getAllContacts() {
      $sql = "SELECT * FROM contatos";
      $result = $this->conn->query($sql);

      $contacts = [];
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $contacts[] = $row;
        }
      }

      return $contacts;
    }

    // Método para obter um contato específico pelo ID
    public function getContactById($id) {
      $sql = "SELECT * FROM contatos WHERE id=$id";
      $result = $this->conn->query($sql);

      if ($result->num_rows == 1) {
        return $result->fetch_assoc();
      } else {
        return null;
      }
    }

    // Método para excluir um contato pelo ID
    public function deleteContact($id) {
      $sql = "DELETE FROM contatos WHERE id=$id";

      if ($this->conn->query($sql) === TRUE) {
          return true;
      } else {
          return false;
      }
    }
}