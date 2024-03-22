<?php
require_once './src/tests/ContactControllerTest.php';

class ContactControllerTest {
  public function testAddContact() {
    $controller = new ContactController();
    return $controller->addContact(new Contact("João", "joao@example.com", "1990-01-01", "123.456.789-00", "(11) 99999-9999"), true);
  }

  public function testEditContact($id) {
    $controller = new ContactController();
    return $controller->editContact($id, new Contact("João da Silva", "joao.silva@example.com", "1990-01-01", "123.456.789-00", "(11) 99999-9999"));
  }

  public function testDeleteContact($id) {
    $controller = new ContactController();
    return $controller->deleteContact($id);
  }
}
