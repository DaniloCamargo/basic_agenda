<?php

require_once './src/tests/ContactControllerTest.php';

class RunTests {
  public static function run() {
    $contact_controller = new ContactControllerTest();
    
    // Teste de adicionar contato
    $resp_add = $contact_controller->testAddContact();
    $resp = $resp_add ? "resp add $resp_add sucesso" : 'resp add erro';
    echo $resp . "\n";
    
    // Teste de editar contato
    $resp_edit = $contact_controller->testEditContact($resp_add);
    $resp = $resp_edit ? "resp edit $resp_add sucesso" : 'resp edit erro';
    echo $resp . "\n";
    
    // Teste de excluir contato
    $resp_del = $contact_controller->testDeleteContact($resp_add);
    $resp = $resp_del ? "resp del $resp_add sucesso" : 'resp del erro';
    echo $resp . "\n";
  }
}