<?php

require_once './src/models/Contact.php';

class ContactController {
  private $contacts = [];

  // Método para adicionar um novo contato
  public function addContact($contact) {
    $this->contacts[] = $contact;
    return true;
  }

  // Método para editar um contato existente
  public function editContact($id, $newContact) {
    foreach ($this->contacts as $key => $contact) {
      if ($contact->id === $id) {
        $this->contacts[$key] = $newContact;
        return true;
      }
    }
    return false; // Contato não encontrado
  }

  // Método para listar todos os contatos
  public function listContacts() {
    return $this->contacts;
  }
}
